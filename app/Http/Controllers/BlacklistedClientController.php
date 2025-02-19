<?php
namespace App\Http\Controllers;

use App\Models\BlacklistedClient;
use Illuminate\Http\Request;

class BlacklistedClientController extends Controller
{
    // Display the main dashboard with the search form and data table
    public function index()
    {
        return view('dashboard');
    }

    // Ajax: Fetch filtered data
    public function search(Request $request)
    {
        $query = BlacklistedClient::query();

        // Filter by account name if provided
        if ($request->filled('account_name')) {
            $query->where('account_name', 'like', '%' . $request->account_name . '%');
        }

        // Filter by institution if provided
        if ($request->filled('institution')) {
            $query->where('institution', 'like', '%' . $request->institution . '%');
        }

        // Fetch sorted results
        $clients = $query->orderBy('account_name')->get();

        return response()->json($clients);
    }

    // Show create form (if not using modal) or return modal view
    public function create()
    {
        return view('clients.create');
    }

    // Store a new record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name'    => 'required|string|max:255',
            'client_type'     => 'required|in:Business,Individual',
            'institution'     => 'required|string|max:255',
            'account_manager' => 'required|string|max:255',
            'date_blacklisted'=> 'required|date',
        ]);

        BlacklistedClient::create($validated);

        return response()->json(['message' => 'Client added successfully.']);
    }

    // Fetch details of a specific record for editing
    public function edit($id)
    {
        $client = BlacklistedClient::find($id);
        return response()->json($client);
    }
    // Update a specific record
    public function update(Request $request, $id)
    {
        $client = BlacklistedClient::find($id);
      
        if ($client) {
            // Validate incoming data if necessary
            $request->validate([
                'account_name' => 'required|string|max:255',
                'client_type' => 'required|string',
                'institution' => 'required|string',
                'account_manager' => 'required|string',
                'date_blacklisted'=> 'required|date',
                // Add other validation rules if needed
            ]);
    
            // Update the client with the form data
            $client->update($request->all());
    
            return response()->json(['message' => 'Client updated successfully']);
        } else {
            return response()->json(['message' => 'Client not found'], 404);
        }

    }    
    // Delete a record
    public function destroy(BlacklistedClient $client)
    {
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully.']);
    }
}