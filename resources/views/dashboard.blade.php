<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Issue Tracker') }}
        </h2>
    </x-slot>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card-animate {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .stat-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .stat-card:hover::before {
            left: 100%;
        }
        
        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            width: 60px;
            height: 60px;
        }
        
        .count-number {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }
        
        .label-text {
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Open Issues Card -->
    <div class="stat-card card-animate bg-white rounded-lg shadow-lg p-6 cursor-pointer" data-status="Open" style="animation-delay: 0.1s">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="label-text text-gray-500 uppercase tracking-wider mb-2">Open Issues</p>
                <div class="count-number text-yellow-600" id="open-count">0</div>
            </div>
            <div class="icon-box bg-yellow-100">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">Awaiting attention</span>
        </div>
    </div>

    <!-- In Progress Card -->
    <div class="stat-card card-animate bg-white rounded-lg shadow-lg p-6 cursor-pointer" data-status="In Progress" style="animation-delay: 0.2s">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="label-text text-gray-500 uppercase tracking-wider mb-2">In Progress</p>
                <div class="count-number text-blue-600" id="in-progress-count">0</div>
            </div>
            <div class="icon-box bg-blue-100">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
        </div>
        <div class="pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">Currently working on</span>
        </div>
    </div>

    <!-- Resolved Card -->
    <div class="stat-card card-animate bg-white rounded-lg shadow-lg p-6 cursor-pointer" data-status="Resolved" style="animation-delay: 0.3s">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="label-text text-gray-500 uppercase tracking-wider mb-2">Resolved</p>
                <div class="count-number text-green-600" id="resolved-count">0</div>
            </div>
            <div class="icon-box bg-green-100">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">Successfully completed</span>
        </div>
    </div>

    <!-- Closed Card -->
    <div class="stat-card card-animate bg-white rounded-lg shadow-lg p-6 cursor-pointer" data-status="Closed" style="animation-delay: 0.4s">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="label-text text-gray-500 uppercase tracking-wider mb-2">Closed</p>
                <div class="count-number text-gray-600" id="closed-count">0</div>
            </div>
            <div class="icon-box bg-gray-100">
                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>
        <div class="pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">All finished</span>
        </div>
    </div>
</div>
            <!-- Total Stats Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8 cursor-pointer" data-status="all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Total Issues</p>
                        <p class="text-3xl font-bold text-gray-900" id="total-count">0</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 mb-2">Completion Rate</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-bold text-green-600" id="completion-rate">0%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Header Section with Add New Issue Button -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <div class="mb-4 sm:mb-0">
                            <h3 class="text-lg font-semibold text-gray-900">Issues Management</h3>
                            <p class="text-sm text-gray-600 mt-1">Manage and track all implementation issues</p>
                        </div>
                        <button onclick="openCreateModal()" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                            + Log New Issue
                        </button>
                    </div>

                    <!-- Replace your search form section with this complete version -->

<!-- Search & Filter Form -->
<form id="search-form" class="mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-1">
            <input type="text" id="issue_title" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search by title">
        </div>
        <div class="md:col-span-1">
            <select id="status_filter" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All Statuses</option>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <div class="md:col-span-1">
            <select id="priority_filter" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All Priorities</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
            </select>
        </div>
        <div class="md:col-span-1">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Search
            </button>
        </div>
    </div>
</form>

<!-- Export Buttons Section -->
<div class="flex justify-between items-center mb-6 p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg border border-gray-200 shadow-sm">
    <div class="flex items-center space-x-2">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        <span class="text-sm font-semibold text-gray-700">Export Current View:</span>
    </div>
    <div class="flex space-x-3">
        
        
        <!-- CSV Export Button -->
        <button onclick="exportToCsv()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-150 shadow-sm hover:shadow-md">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"/>
            </svg>
            CSV
        </button>
        
        <!-- PDF Export Button -->
        <button onclick="exportToPdf()" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-150 shadow-sm hover:shadow-md">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
            </svg>
            PDF
        </button>
    </div>
</div>



                    
                    <!-- Issues Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table id="issues-table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issue #</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Source</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Implementation Deadline</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reported By</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Reported</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="issues-table-body" class="bg-white divide-y divide-gray-200">
                                <!-- Data will be loaded via Ajax -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Issue Modal -->
    <div class="fixed inset-0 overflow-y-auto hidden" id="createModal" aria-labelledby="createModalLabel" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="createModalLabel">
                        Log New Issue
                    </h3>
                    <form id="createForm" class="space-y-4">
                        <div>
                            <label for="create_title" class="block text-sm font-medium text-gray-700">Issue Title *</label>
                            <input type="text" id="create_title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <div>
                            <label for="create_source" class="block text-sm font-medium text-gray-700">Source *</label>
                            <input type="text" id="create_source" name="source" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <div>
                            <label for="create_finding" class="block text-sm font-medium text-gray-700">Finding *</label>
                            <textarea id="create_finding" name="finding" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="create_category" class="block text-sm font-medium text-gray-700">Category *</label>
                                <select id="create_category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">Select Category</option>
                                    <option value="IT">IT/Technology</option>
                                    <option value="Facilities">Facilities</option>
                                    <option value="HR">HR</option>
                                    <option value="Assets">Assets</option>
                                    <option value="Safety">Safety</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="create_priority" class="block text-sm font-medium text-gray-700">Priority *</label>
                                <select id="create_priority" name="priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="Low">Low</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="High">High</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="create_implementationdeadline" class="block text-sm font-medium text-gray-700">Implementation Deadline *</label>
                            <input type="date" id="create_implementationdeadline" name="implementation_deadline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <div>
                            <label for="create_reported_by" class="block text-sm font-medium text-gray-700">Reported By *</label>
                            <input type="text" id="create_reported_by" name="reported_by" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                    </form>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="saveCreateButton" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Log Issue
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeCreateModal()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

   <!-- Edit Issue Modal -->
<div class="fixed inset-0 overflow-y-auto hidden" id="editModal" aria-labelledby="editModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="editModalLabel">
                    Edit Issue
                </h3>
                <form id="editForm" class="space-y-4">
                    <!-- FIXED: Separate the issue ID from _method -->
                    <input type="hidden" id="edit_issue_id" name="id">
                    
                    <div>
                        <label for="edit_title" class="block text-sm font-medium text-gray-700">Issue Title *</label>
                        <input type="text" id="edit_title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                            
                            <div>
                        <label for="edit_source" class="block text-sm font-medium text-gray-700">Source *</label>
                        <input type="text" id="edit_source" name="source" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>
                            
                    <div>
                        <label for="edit_finding" class="block text-sm font-medium text-gray-700">Finding *</label>
                        <textarea id="edit_finding" name="finding" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_category" class="block text-sm font-medium text-gray-700">Category *</label>
                            <select id="edit_category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="IT">IT/Technology</option>
                                <option value="Facilities">Facilities</option>
                                <option value="HR">HR</option>
                                <option value="Equipment">Equipment</option>
                                <option value="Safety">Safety</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="edit_priority" class="block text-sm font-medium text-gray-700">Priority *</label>
                            <select id="edit_priority" name="priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Critical">Critical</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="edit_implementation_deadline" class="block text-sm font-medium text-gray-700">Implementation Deadline *</label>
                        <input type="date" id="edit_implementation_deadline" name="implementation_deadline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700">Status *</label>
                        <select id="edit_status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>

                    <div>
                        <label for="edit_resolution_notes" class="block text-sm font-medium text-gray-700">Resolution Notes</label>
                        <textarea id="edit_resolution_notes" name="resolution_notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="saveEditButton" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save Changes
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeEditModal()">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- Delete Confirmation Modal -->
    <div class="fixed inset-0 overflow-y-auto hidden" id="deleteModal" aria-labelledby="deleteModalLabel" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="deleteModalLabel">
                                Delete Issue
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete this issue? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirmDelete" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeDeleteModal()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Issue Detail Modal -->
    <div class="fixed inset-0 overflow-y-auto hidden" id="viewModal" aria-labelledby="viewModalLabel" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="viewModalLabel">
                            Issue Details
                        </h3>
                        <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <div id="viewContent" class="space-y-4">
                        <!-- Issue Number & Status Header -->
                        <div class="flex justify-between items-center pb-4 border-b">
                            <div>
                                <span class="text-2xl font-bold text-gray-900" id="view_issue_number"></span>
                            </div>
                            <div id="view_status_badge"></div>
                        </div>

                        <!-- Title -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Issue Title</h4>
                            <p class="text-base text-gray-900" id="view_title"></p>
                        </div>

                        <!-- Source & Category -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Source</h4>
                                <p class="text-base text-gray-900" id="view_source"></p>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Category</h4>
                                <p class="text-base text-gray-900" id="view_category"></p>
                            </div>
                        </div>

                        <!-- Finding -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Finding</h4>
                            <p class="text-base text-gray-900 whitespace-pre-wrap" id="view_finding"></p>
                        </div>

                        <!-- Priority & Implementation Deadline -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Priority</h4>
                                <div id="view_priority_badge"></div>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Implementation Deadline</h4>
                                <p class="text-base text-gray-900" id="view_implementation_deadline"></p>
                            </div>
                        </div>

                        <!-- Reported By & Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Reported By</h4>
                                <p class="text-base text-gray-900" id="view_reported_by"></p>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Date Reported</h4>
                                <p class="text-base text-gray-900" id="view_date_reported"></p>
                            </div>
                        </div>

                        <!-- Resolution Notes (if exists) -->
                        <div id="view_resolution_section" class="hidden">
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Resolution Notes</h4>
                            <p class="text-base text-gray-900 whitespace-pre-wrap" id="view_resolution_notes"></p>
                        </div>

                        <!-- Date Resolved (if exists) -->
                        <div id="view_resolved_section" class="hidden">
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Date Resolved</h4>
                            <p class="text-base text-gray-900" id="view_date_resolved"></p>
                        </div>

                        <!-- Timestamps -->
                        <div class="pt-4 border-t text-xs text-gray-500">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <span class="font-medium">Created:</span> 
                                    <span id="view_created_at"></span>
                                </div>
                                <div>
                                    <span class="font-medium">Last Updated:</span> 
                                    <span id="view_updated_at"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeViewModal()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
   <script>
        let issueIdToDelete = null;
        let currentStatusFilter = null; // Track current status filter

        document.addEventListener('DOMContentLoaded', function () {
            // Load all issues on page load
            loadIssues();
            updateStats();

            // Search form submission
            document.getElementById('search-form').addEventListener('submit', function (e) {
                e.preventDefault();
                currentStatusFilter = null; // Reset status filter when manually searching
                loadIssues();
            });

            // Stat card click handlers
            document.querySelector('[data-status="Open"]')?.addEventListener('click', function() {
                currentStatusFilter = 'Open';
                loadIssues();
            });

            document.querySelector('[data-status="In Progress"]')?.addEventListener('click', function() {
                currentStatusFilter = 'In Progress';
                loadIssues();
            });

            document.querySelector('[data-status="Resolved"]')?.addEventListener('click', function() {
                currentStatusFilter = 'Resolved';
                loadIssues();
            });

            document.querySelector('[data-status="Closed"]')?.addEventListener('click', function() {
                currentStatusFilter = 'Closed';
                loadIssues();
            });

            document.querySelector('[data-status="all"]')?.addEventListener('click', function() {
                currentStatusFilter = null; // Clear filter to show all issues
                loadIssues();
            });

            // Create issue form submission
            document.getElementById('saveCreateButton').addEventListener('click', function() {
                const form = document.getElementById('createForm');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                const formData = new FormData(form);
                const data = Object.fromEntries(formData);

                // Add date_reported
                const today = new Date();
                const dateString = today.getFullYear() + '-' + 
                                String(today.getMonth() + 1).padStart(2, '0') + '-' + 
                                String(today.getDate()).padStart(2, '0');
                data.date_reported = dateString;

                console.log('Sending data:', data);

                fetch('{{ route("issues.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        return response.json().then(err => {
                            console.error('Error response:', err);
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                    if (data.message) {
                        closeCreateModal();
                        loadIssues();
                        updateStats();
                        alert('✅ Issue logged successfully');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (error.errors) {
                        let errorMsg = Object.values(error.errors).flat().join('\n');
                        alert('❌ Validation Error:\n' + errorMsg);
                    } else {
                        alert('❌ Error logging issue');
                    }
                });
            });

            // Edit issue form submission - URL-encoded approach
            document.getElementById('saveEditButton').addEventListener('click', function() {
                const form = document.getElementById('editForm');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
                const issueId = document.getElementById('edit_issue_id').value;
                const formData = new FormData(form);
                formData.append('_method', 'POST');

                // Convert FormData to URL-encoded string
                const urlEncodedData = new URLSearchParams(formData).toString();

                console.log('=== URL-ENCODED APPROACH ===');
                console.log('Data to send:', urlEncodedData);

                fetch(`/issues/update/${issueId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                        'Accept': 'application/json'
                    },
                    body: urlEncodedData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success || data.message) {
                        closeEditModal();
                        loadIssues();
                        updateStats();
                        alert('Issue updated successfully');
                    } else if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat().join('\n');
                        alert('Validation errors:\n' + errorMessages);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Error updating issue: ' + error.message);
                });
            });

            // Delete confirmation
            document.getElementById('confirmDelete').addEventListener('click', function() {
                if (issueIdToDelete) {
                    fetch(`/issues/destroy/${issueIdToDelete}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            _method: 'DELETE'
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                console.error('Error response:', err);
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.message) {
                            closeDeleteModal();
                            loadIssues();
                            updateStats();
                            alert('✅ Issue deleted successfully');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('❌ Error deleting issue');
                    });
                }
            });
        });

        function loadIssues() {
            const issueTitle = document.getElementById('issue_title').value.trim();
            const priorityFilter = document.getElementById('priority_filter').value;
            
            // Use currentStatusFilter if set (from card click), otherwise use form filter
            const statusFilter = currentStatusFilter || document.getElementById('status_filter').value;

            const queryParams = new URLSearchParams();
            if (issueTitle) queryParams.append('title', issueTitle);
            if (statusFilter) queryParams.append('status', statusFilter);
            if (priorityFilter) queryParams.append('priority', priorityFilter);

            fetch('/issues/search?' + queryParams.toString(), {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                updateTable(data);
            })
            .catch(error => console.error('Error:', error));
        }

        function updateStats() {
            fetch('/issues/search', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (!Array.isArray(data)) {
                    console.error('Data is not an array:', data);
                    return;
                }

                const counts = {
                    'Open': 0,
                    'In Progress': 0,
                    'Resolved': 0,
                    'Closed': 0
                };

                data.forEach(issue => {
                    if (counts.hasOwnProperty(issue.status)) {
                        counts[issue.status]++;
                    }
                });

                document.getElementById('open-count').textContent = counts['Open'];
                document.getElementById('in-progress-count').textContent = counts['In Progress'];
                document.getElementById('resolved-count').textContent = counts['Resolved'];
                document.getElementById('closed-count').textContent = counts['Closed'];
                
                const total = data.length;
                const completed = counts['Resolved'] + counts['Closed'];
                const completionRate = total === 0 ? 0 : Math.round((completed / total) * 100);
                
                document.getElementById('total-count').textContent = total;
                document.getElementById('completion-rate').textContent = completionRate + '%';
            })
            .catch(error => console.error('Error:', error));
        }

        function formatDate(dateString) {
            if (!dateString) return 'N/A';
            return dateString.split('T')[0];
        }

        function isDeadlinePassed(deadlineString) {
            if (!deadlineString) return false;
            const deadline = new Date(deadlineString);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            deadline.setHours(0, 0, 0, 0);
            return deadline < today;
        }

        function getDeadlineColor(deadlineString) {
            if (!deadlineString) return '';
            return isDeadlinePassed(deadlineString) ? 'text-red-600 font-semibold' : 'text-green-600 font-semibold';
        }

        function updateTable(data) {
            const tableBody = document.getElementById('issues-table-body');
            tableBody.innerHTML = '';

            if (!Array.isArray(data) || data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="10" class="text-center py-4 text-gray-500">No issues found</td></tr>`;
                return;
            }

            data.forEach(issue => {
                const statusBadge = getStatusBadge(issue.status);
                const priorityBadge = getPriorityBadge(issue.priority);
                const deadlineColor = getDeadlineColor(issue.implementation_deadline);
                
                const row = `<tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#${issue.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${issue.title}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${issue.source || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${issue.category}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${priorityBadge}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${statusBadge}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm ${deadlineColor}">${formatDate(issue.implementation_deadline) || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${issue.reported_by}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${issue.date_reported}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <button class="viewButton text-indigo-600 hover:text-indigo-900" data-id="${issue.id}">View</button>
                        <button class="editButton text-blue-600 hover:text-blue-900" data-id="${issue.id}">Edit</button>
                        <button class="deleteButton text-red-600 hover:text-red-900" data-id="${issue.id}">Delete</button>
                    </td>
                </tr>`;
                tableBody.insertAdjacentHTML('beforeend', row);
            });

            attachEventListeners();
        }

        function attachEventListeners() {
            document.querySelectorAll('.editButton').forEach(button => {
                button.addEventListener('click', function() {
                    const issueId = this.getAttribute('data-id');
                    openEditModal(issueId);
                });
            });

            document.querySelectorAll('.deleteButton').forEach(button => {
                button.addEventListener('click', function() {
                    issueIdToDelete = this.getAttribute('data-id');
                    openDeleteModal();
                });
            });

            document.querySelectorAll('.viewButton').forEach(button => {
                button.addEventListener('click', function() {
                    const issueId = this.getAttribute('data-id');
                    openViewModal(issueId);
                });
            });
        }

        function getStatusBadge(status) {
            const badges = {
                'Open': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Open</span>',
                'In Progress': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>',
                'Resolved': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Resolved</span>',
                'Closed': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Closed</span>'
            };
            return badges[status] || status;
        }

        function getPriorityBadge(priority) {
            const badges = {
                'Low': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Low</span>',
                'Medium': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Medium</span>',
                'High': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">High</span>',
                'Critical': '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Critical</span>'
            };
            return badges[priority] || priority;
        }

        function openViewModal(issueId) {
            fetch(`/issues/${issueId}/edit`, {
                headers: { 'Accept': 'application/json' }
            })
            .then(response => response.json())
            .then(issue => {
                if (!issue || Object.keys(issue).length === 0) {
                    alert("Error: No issue data found.");
                    return;
                }

                document.getElementById('view_issue_number').textContent = `Issue #${issue.id}`;
                document.getElementById('view_title').textContent = issue.title || 'N/A';
                document.getElementById('view_source').textContent = issue.source || 'N/A';
                document.getElementById('view_category').textContent = issue.category || 'N/A';
                document.getElementById('view_finding').textContent = issue.finding || 'N/A';
                document.getElementById('view_reported_by').textContent = issue.reported_by || 'N/A';
                document.getElementById('view_date_reported').textContent = formatDate(issue.date_reported);
                
                const deadlineElement = document.getElementById('view_implementation_deadline');
                deadlineElement.textContent = formatDate(issue.implementation_deadline);
                deadlineElement.className = getDeadlineColor(issue.implementation_deadline);
                
                document.getElementById('view_status_badge').innerHTML = getStatusBadge(issue.status);
                document.getElementById('view_priority_badge').innerHTML = getPriorityBadge(issue.priority);

                if (issue.resolution_notes) {
                    document.getElementById('view_resolution_notes').textContent = issue.resolution_notes;
                    document.getElementById('view_resolution_section').classList.remove('hidden');
                } else {
                    document.getElementById('view_resolution_section').classList.add('hidden');
                }

                if (issue.date_resolved) {
                    document.getElementById('view_date_resolved').textContent = formatDate(issue.date_resolved);
                    document.getElementById('view_resolved_section').classList.remove('hidden');
                } else {
                    document.getElementById('view_resolved_section').classList.add('hidden');
                }

                document.getElementById('view_created_at').textContent = formatDateTime(issue.created_at);
                document.getElementById('view_updated_at').textContent = formatDateTime(issue.updated_at);

                document.getElementById('viewModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Error loading issue details.');
            });
        }

        function formatDateTime(dateString) {
            if (!dateString) return 'N/A';
            const date = new Date(dateString);
            return date.toLocaleString('en-US', { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('createForm').reset();
        }

        function openEditModal(issueId) {
            fetch(`/issues/${issueId}/edit`, {
                headers: { 'Accept': 'application/json' }
            })
            .then(response => response.json())
            .then(issue => {
                if (!issue || Object.keys(issue).length === 0) {
                    alert("Error: No issue data found.");
                    return;
                }

                document.getElementById('edit_issue_id').value = issue.id;
                document.getElementById('edit_title').value = issue.title;
                document.getElementById('edit_source').value = issue.source;
                document.getElementById('edit_finding').value = issue.finding;
                document.getElementById('edit_category').value = issue.category;
                document.getElementById('edit_priority').value = issue.priority;
                document.getElementById('edit_implementation_deadline').value = issue.implementation_deadline;
                document.getElementById('edit_status').value = issue.status;
                document.getElementById('edit_resolution_notes').value = issue.resolution_notes || '';

                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Error loading issue data.');
            });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
        }

        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            issueIdToDelete = null;
        }

        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }

       /**
 * Export to Excel (XLSX format)
 */
function exportToExcel() {
    const issueTitle = document.getElementById('issue_title').value.trim();
    const statusFilter = currentStatusFilter || document.getElementById('status_filter').value;
    const priorityFilter = document.getElementById('priority_filter').value;

    const queryParams = new URLSearchParams();
    if (issueTitle) queryParams.append('title', issueTitle);
    if (statusFilter) queryParams.append('status', statusFilter);
    if (priorityFilter) queryParams.append('priority', priorityFilter);

    // Show loading indicator (optional)
    const exportButton = event.target.closest('button');
    const originalText = exportButton.innerHTML;
    exportButton.disabled = true;
    exportButton.innerHTML = '<svg class="animate-spin h-4 w-4 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Exporting...';

    // Open export URL
    window.open('/issues/export/excel?' + queryParams.toString(), '_blank');

    // Reset button after a short delay
    setTimeout(() => {
        exportButton.disabled = false;
        exportButton.innerHTML = originalText;
    }, 2000);
}

/**
 * Export to CSV format
 */
function exportToCsv() {
    const issueTitle = document.getElementById('issue_title').value.trim();
    const statusFilter = currentStatusFilter || document.getElementById('status_filter').value;
    const priorityFilter = document.getElementById('priority_filter').value;

    const queryParams = new URLSearchParams();
    if (issueTitle) queryParams.append('title', issueTitle);
    if (statusFilter) queryParams.append('status', statusFilter);
    if (priorityFilter) queryParams.append('priority', priorityFilter);

    // Show loading indicator (optional)
    const exportButton = event.target.closest('button');
    const originalText = exportButton.innerHTML;
    exportButton.disabled = true;
    exportButton.innerHTML = '<svg class="animate-spin h-4 w-4 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Exporting...';

    // Open export URL
    window.open('/issues/export/csv?' + queryParams.toString(), '_blank');

    // Reset button after a short delay
    setTimeout(() => {
        exportButton.disabled = false;
        exportButton.innerHTML = originalText;
    }, 2000);
}

/**
 * Export to PDF format
 */
function exportToPdf() {
    const issueTitle = document.getElementById('issue_title').value.trim();
    const statusFilter = currentStatusFilter || document.getElementById('status_filter').value;
    const priorityFilter = document.getElementById('priority_filter').value;

    const queryParams = new URLSearchParams();
    if (issueTitle) queryParams.append('title', issueTitle);
    if (statusFilter) queryParams.append('status', statusFilter);
    if (priorityFilter) queryParams.append('priority', priorityFilter);

    // Show loading indicator (optional)
    const exportButton = event.target.closest('button');
    const originalText = exportButton.innerHTML;
    exportButton.disabled = true;
    exportButton.innerHTML = '<svg class="animate-spin h-4 w-4 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Exporting...';

    // Open export URL
    window.open('/issues/export/pdf?' + queryParams.toString(), '_blank');

    // Reset button after a short delay
    setTimeout(() => {
        exportButton.disabled = false;
        exportButton.innerHTML = originalText;
    }, 2000);


// Make export functions globally accessible
window.exportToExcel = exportToExcel;
window.exportToCsv = exportToCsv;
window.exportToPdf = exportToPdf;
}

        // Make functions globally accessible
        window.openCreateModal = openCreateModal;
        window.closeCreateModal = closeCreateModal;
        window.closeEditModal = closeEditModal;
        window.closeDeleteModal = closeDeleteModal;
        window.closeViewModal = closeViewModal;
    </script>
    @endpush
</x-app-layout>