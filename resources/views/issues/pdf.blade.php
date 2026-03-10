<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Issues Export</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #4472C4;
        }
        .header h1 {
            color: #4472C4;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .stat-box {
            display: table-cell;
            width: 16.66%;
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .stat-label {
            font-size: 8px;
            color: #666;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .stat-value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #4472C4;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 9px;
            font-weight: bold;
        }
        td {
            padding: 6px 8px;
            border-bottom: 1px solid #ddd;
            font-size: 9px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
        }
        .status-open { background-color: #FEF3C7; color: #92400E; }
        .status-progress { background-color: #DBEAFE; color: #1E40AF; }
        .status-resolved { background-color: #D1FAE5; color: #065F46; }
        .status-closed { background-color: #F3F4F6; color: #374151; }
        .priority-low { background-color: #F3F4F6; color: #374151; }
        .priority-medium { background-color: #FEF3C7; color: #92400E; }
        .priority-high { background-color: #FED7AA; color: #9A3412; }
        .priority-critical { background-color: #FEE2E2; color: #991B1B; }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 8px;
            color: #666;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Issue Tracker Report</h1>
        <p>Generated on: {{ date('F d, Y - H:i:s') }}</p>
    </div>

    <div class="stats-grid">
        <div class="stat-box">
            <div class="stat-label">Total Issues</div>
            <div class="stat-value">{{ $stats['total'] }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Open</div>
            <div class="stat-value" style="color: #D97706;">{{ $stats['open'] }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">In Progress</div>
            <div class="stat-value" style="color: #2563EB;">{{ $stats['in_progress'] }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Resolved</div>
            <div class="stat-value" style="color: #059669;">{{ $stats['resolved'] }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Closed</div>
            <div class="stat-value" style="color: #6B7280;">{{ $stats['closed'] }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Completion</div>
            <div class="stat-value" style="color: #059669;">{{ $stats['completion_rate'] }}%</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 20%;">Title</th>
                <th style="width: 10%;">Source</th>
                <th style="width: 10%;">Category</th>
                <th style="width: 10%;">Priority</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 12%;">Deadline</th>
                <th style="width: 12%;">Reported By</th>
                <th style="width: 11%;">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
            <tr>
                <td>#{{ $issue->id }}</td>
                <td>{{ $issue->title }}</td>
                <td>{{ $issue->source ?? 'N/A' }}</td>
                <td>{{ $issue->category }}</td>
                <td>
                    <span class="badge priority-{{ strtolower($issue->priority) }}">
                        {{ $issue->priority }}
                    </span>
                </td>
                <td>
                    <span class="badge status-{{ str_replace(' ', '', strtolower($issue->status)) }}">
                        {{ $issue->status }}
                    </span>
                </td>
                <td>{{ $issue->implementation_deadline ?? 'N/A' }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->date_reported }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Issue Tracker System - Confidential Report</p>
    </div>
</body>
</html>