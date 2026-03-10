<?php

namespace App\Http\Controllers;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
class IssueController extends Controller
{
    
    /**
     * Display the issues dashboard
     */
    public function index()
    {
        return view('issues.index');
    }

    /**
     * Search and filter issues
     */
    public function search(Request $request)
    {
        $query = Issue::query();

        // Search by title
        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter by status
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->has('priority') && !empty($request->priority)) {
            $query->where('priority', $request->priority);
        }

        // Order by most recent first
        $issues = $query->orderBy('created_at', 'desc')->get();

        return response()->json($issues);
    }

    /**
     * Store a new issue
     */
    public function store(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Store issue request received', $request->all());

        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'finding' => 'required|string',
            'category' => 'required|string',
            'priority' => 'required|in:Low,Medium,High,Critical',
            'implementation_deadline' => 'required|date', // ✅ Validate as date
            'reported_by' => 'required|string|max:255',
            'date_reported' => 'required|date',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            Log::error('Validation failed', $validator->errors()->toArray());
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create the issue
            $issue = Issue::create([
                'title' => $request->title,
                'source' => $request->source,
                'finding' => $request->finding,
                'category' => $request->category,
                'priority' => $request->priority,
                'status' => 'Open', // Default status for new issues
                'implementation_deadline' => $request->implementation_deadline,
                'reported_by' => $request->reported_by,
                'date_reported' => $request->date_reported,
            ]);

            Log::info('Issue created successfully', ['issue_id' => $issue->id]);

            // Return success response
            return response()->json([
                'message' => 'Issue logged successfully.',
                'issue' => $issue
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating issue: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Error creating issue',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get issue data for editing
     */
    public function edit($id)
    {
        try {
            $issue = Issue::findOrFail($id);
            return response()->json($issue);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Issue not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update an existing issue
     */
    public function update(Request $request, $id)
    {
        try {
            $issue = Issue::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'source' => 'required|string|max:255',
                'finding' => 'required|string',
                'category' => 'required|string',
                'priority' => 'required|in:Low,Medium,High,Critical',
                'status' => 'required|in:Open,In Progress,Resolved,Closed',
                'implementation_deadline' => 'required|date', // ✅ Validate as date
                'resolution_notes' => 'nullable|string',
            ]);

            

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $issue->update($request->all());

            // If status changed to Resolved or Closed, set resolution date
            if (in_array($request->status, ['Resolved', 'Closed']) && !$issue->date_resolved) {
                $issue->date_resolved = now()->toDateString();
                $issue->save();
            }

            return response()->json([
                'message' => 'Issue updated successfully.',
                'issue' => $issue
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating issue',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete an issue
     */
    public function destroy($id)
    {
        try {
            $issue = Issue::findOrFail($id);
            $issue->delete();

            return response()->json([
                'message' => 'Issue deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting issue',
                'error' => $e->getMessage()
            ], 500);
        }
    }

     /**
     * Export issues to Excel using Box/Spout (No GD Extension Required)
     */
    public function exportExcel(Request $request)
    {
        // Get filtered issues
        $query = Issue::query();

        if ($request->has('title') && $request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority) {
            $query->where('priority', $request->priority);
        }

        $issues = $query->orderBy('id', 'desc')->get();

        // Create filename
        $filename = 'issues_export_' . date('Y-m-d_His') . '.xlsx';
        $filePath = storage_path('app/public/' . $filename);

        // Create writer
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($filePath);

        // Create header style (bold, blue background, white text)
        $headerStyle = (new StyleBuilder())
            ->setFontBold()
            ->setFontSize(11)
            ->setFontColor(Color::WHITE)
            ->setBackgroundColor(Color::rgb(68, 114, 196))
            ->build();

        // Create header row
        $headerCells = [
            WriterEntityFactory::createCell('Issue #'),
            WriterEntityFactory::createCell('Title'),
            WriterEntityFactory::createCell('Source'),
            WriterEntityFactory::createCell('Category'),
            WriterEntityFactory::createCell('Priority'),
            WriterEntityFactory::createCell('Status'),
            WriterEntityFactory::createCell('Implementation Deadline'),
            WriterEntityFactory::createCell('Reported By'),
            WriterEntityFactory::createCell('Date Reported'),
            WriterEntityFactory::createCell('Resolution Notes'),
            WriterEntityFactory::createCell('Date Resolved'),
        ];

        $headerRow = WriterEntityFactory::createRow($headerCells, $headerStyle);
        $writer->addRow($headerRow);

        // Add data rows
        foreach ($issues as $issue) {
            $cells = [
                WriterEntityFactory::createCell($issue->id),
                WriterEntityFactory::createCell($issue->title),
                WriterEntityFactory::createCell($issue->source ?? 'N/A'),
                WriterEntityFactory::createCell($issue->category),
                WriterEntityFactory::createCell($issue->priority),
                WriterEntityFactory::createCell($issue->status),
                WriterEntityFactory::createCell($issue->implementation_deadline ?? 'N/A'),
                WriterEntityFactory::createCell($issue->reported_by),
                WriterEntityFactory::createCell($issue->date_reported),
                WriterEntityFactory::createCell($issue->resolution_notes ?? 'N/A'),
                WriterEntityFactory::createCell($issue->date_resolved ?? 'N/A'),
            ];

            $row = WriterEntityFactory::createRow($cells);
            $writer->addRow($row);
        }

        $writer->close();

        // Download file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    /**
     * Export issues to CSV (Simplest option - No dependencies needed)
     */
    public function exportCsv(Request $request)
    {
        // Get filtered issues
        $query = Issue::query();

        if ($request->has('title') && $request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority) {
            $query->where('priority', $request->priority);
        }

        $issues = $query->orderBy('id', 'desc')->get();

        $filename = 'issues_export_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($issues) {
            $file = fopen('php://output', 'w');

            // Add UTF-8 BOM for proper Excel encoding
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Add headers
            fputcsv($file, [
                'Issue #', 'Title', 'Source', 'Category', 'Priority', 
                'Status', 'Implementation Deadline', 'Reported By', 
                'Date Reported', 'Resolution Notes', 'Date Resolved'
            ]);

            // Add data
            foreach ($issues as $issue) {
                fputcsv($file, [
                    $issue->id,
                    $issue->title,
                    $issue->source ?? 'N/A',
                    $issue->category,
                    $issue->priority,
                    $issue->status,
                    $issue->implementation_deadline ?? 'N/A',
                    $issue->reported_by,
                    $issue->date_reported,
                    $issue->resolution_notes ?? 'N/A',
                    $issue->date_resolved ?? 'N/A',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export issues to PDF (DomPDF works without GD)
     */
    public function exportPdf(Request $request)
    {
        // Get filtered issues
        $query = Issue::query();

        if ($request->has('title') && $request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority) {
            $query->where('priority', $request->priority);
        }

        $issues = $query->orderBy('id', 'desc')->get();

        // Calculate statistics
        $stats = [
            'total' => $issues->count(),
            'open' => $issues->where('status', 'Open')->count(),
            'in_progress' => $issues->where('status', 'In Progress')->count(),
            'resolved' => $issues->where('status', 'Resolved')->count(),
            'closed' => $issues->where('status', 'Closed')->count(),
        ];

        $stats['completion_rate'] = $stats['total'] > 0 
            ? round((($stats['resolved'] + $stats['closed']) / $stats['total']) * 100) 
            : 0;

        $pdf = Pdf::loadView('issues.pdf', compact('issues', 'stats'));
        
        return $pdf->download('issues_export_' . date('Y-m-d_His') . '.pdf');
    }
    
}

