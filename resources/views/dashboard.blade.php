<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blacklisted Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Search Form -->
                <form id="search-form" class="mb-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-4">
                    <div class="flex-1">
                        <input type="text" id="account_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Account Name">
                    </div>
                    <div class="flex-1">
                        <input type="text" id="institution" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Institution">
                    </div>
                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Search
                        </button>
                    </div>
                </form>

                <!-- DataTable -->
                <div class="overflow-x-auto">
                    <table id="clients-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Institution</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Manager</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Blacklisted</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="clients-table-body" class="bg-white divide-y divide-gray-200">
                            <!-- Data will be loaded via Ajax -->
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="fixed inset-0 overflow-y-auto hidden" id="deleteModal" aria-labelledby="deleteModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Warning icon -->
                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="deleteModalLabel">
                            Delete Client
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this client? This action cannot be undone.
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

            </div>
        </div>
    </div>

    <!-- Edit Modal -->
<div class="fixed inset-0 overflow-y-auto hidden" id="editModal" aria-labelledby="editModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="editModalLabel">
                    Edit Client
                </h3>
                <form id="editForm" class="space-y-4">
                    <input type="hidden" id="edit_client_id" name="client_id">
                    
                    <div>
                        <label for="edit_account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                        <input type="text" id="edit_account_name" name="account_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                    <div>
                        <label for="edit_client_type" class="block text-sm font-medium text-gray-700">Client Type</label>
                        <select id="edit_client_type" name="client_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="Business">Business</option>
                            <option value="Individual">Individual</option>
                        </select>
                    </div>

                    <div>
                        <label for="edit_institution" class="block text-sm font-medium text-gray-700">Institution</label>
                        <input type="text" id="edit_institution" name="institution" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                    <div>
                        <label for="edit_account_manager" class="block text-sm font-medium text-gray-700">Account Manager</label>
                        <input type="text" id="edit_account_manager" name="account_manager" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                    <div>
                        <label for="edit_date_blacklisted" class="block text-sm font-medium text-gray-700">Date Blacklisted</label>
                        <input type="date" id="edit_date_blacklisted" name="date_blacklisted" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('search-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form submission

        // Get input values correctly
        const accountName = document.getElementById('account_name').value.trim();
        const institution = document.getElementById('institution').value.trim();

        // Build query string
        const queryParams = new URLSearchParams();
        if (accountName) queryParams.append('account_name', accountName);
        if (institution) queryParams.append('institution', institution);

        // Send AJAX request (UPDATED URL)
        fetch('/dashboard/search?' + queryParams.toString(), {  // ✅ FIXED
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);  // Debugging step
            updateTable(data);  // Update table with results
        })
        .catch(error => console.error('Error:', error));
    });

    function updateTable(data) {
    console.log("Updating table with data:", data);  // Debugging step

    const tableBody = document.getElementById('clients-table-body');
    if (!tableBody) {
        console.error("Table body element not found!");
        return;
    }

    tableBody.innerHTML = ''; // Clear existing rows

    if (!Array.isArray(data) || data.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="6" class="text-center py-3">No results found</td></tr>`;
        return;
    }

    data.forEach(client => {
        const row = `<tr>
            <td class="px-6 py-4 whitespace-nowrap">${client.account_name}</td>
            <td class="px-6 py-4 whitespace-nowrap">${client.client_type}</td>
            <td class="px-6 py-4 whitespace-nowrap">${client.institution}</td>
            <td class="px-6 py-4 whitespace-nowrap">${client.account_manager}</td>
            <td class="px-6 py-4 whitespace-nowrap">${client.date_blacklisted}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                    <button class="editButton bg-yellow-500 text-white px-2 py-1 rounded" data-id="${client.id}">Edit</button>
                    <button class="deleteButton bg-red-500 text-white px-2 py-1 rounded" data-id="${client.id}">Delete</button>
            </td>
        </tr>`;
        tableBody.insertAdjacentHTML('beforeend', row);
    });

    console.log("Table updated successfully.");

     // Add event listeners to new buttons
     document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function() {
                clientIdToDelete = this.getAttribute('data-id');
                openDeleteModal();
            });
        });

        document.querySelectorAll('.editButton').forEach(button => {
            button.addEventListener('click', function() {
                const clientId = this.getAttribute('data-id');
                openEditModal(clientId);
            });
        });
}

});
 // Function to open delete modal
 function openDeleteModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.remove('hidden');
    }

    // Function to close delete modal
    function closeDeleteModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.add('hidden');
        clientIdToDelete = null;
    }
  // Make closeDeleteModal available globally
  window.closeDeleteModal = closeDeleteModal;

      // Handle delete confirmation
      document.getElementById('confirmDelete').addEventListener('click', function() {
        if (clientIdToDelete) {
            // Get CSRF token
            const token = document.querySelector('meta[name="csrf-token"]').content;

            fetch(`/dashboard/destroy/${clientIdToDelete}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Client deleted successfully.') {
                    // Close the modal
                    closeDeleteModal();
                    
                    // Refresh the table
                    document.getElementById('search-form').dispatchEvent(new Event('submit'));
                    
                    // Show success message (optional)
                    alert('Client deleted successfully');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting client');
            });
        }
    });

    
    function openEditModal(clientId) {
    console.log("Opening edit modal for client ID:", clientId); // ✅ Check client ID in console

    fetch(`/dashboard/${clientId}/edit`, {
        headers: { 'Accept': 'application/json' }
    })
    .then(response => response.json())
    .then(client => {
        console.log("Client data received:", client); // ✅ Check response data

        if (!client || Object.keys(client).length === 0) {
            console.error("Invalid client data received:", client);
            alert("Error: No client data found.");
            return;
        }

        // Populate modal fields
        document.getElementById('edit_client_id').value = client.id;
        document.getElementById('edit_account_name').value = client.account_name;
        document.getElementById('edit_client_type').value = client.client_type;
        document.getElementById('edit_institution').value = client.institution;
        document.getElementById('edit_account_manager').value = client.account_manager;
        document.getElementById('edit_date_blacklisted').value = client.date_blacklisted;

        // Show modal
        document.getElementById('editModal').classList.remove('hidden');
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Error loading client data. Check console for details.');
    });
}



    // Function to close edit modal
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editForm').reset();
    }
    
    // Make closeEditModal available globally
    window.closeEditModal = closeEditModal;

    // Handle form submission
    document.getElementById('saveEditButton').addEventListener('click', function() {
        const form = document.getElementById('editForm');
        const clientId = document.getElementById('edit_client_id').value;
        const formData = new FormData(form);
        
        fetch(`/dashboard/update/${clientId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                // Close modal
                closeEditModal();
                
                // Refresh table
                document.getElementById('search-form').dispatchEvent(new Event('submit'));
                
                // Show success message
                alert('Client updated successfully');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating client');
        });
    });


    
    </script>
    @endpush
</x-app-layout>
