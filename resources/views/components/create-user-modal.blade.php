@props(['show' => false])

<div x-data="{ 
    show: @js($show),
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'user',
    errors: {},
    successMessage: '',
    
    submitForm() {
        this.errors = {};
        this.successMessage = '';
        
        fetch('{{ route('admin.users.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                role: this.role
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                this.errors = data.errors;
            } else if (data.success) {
                this.successMessage = data.message;
                this.resetForm();
                setTimeout(() => {
                    this.show = false;
                    
                }, 1500);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    },
    
    resetForm() {
        this.name = '';
        this.email = '';
        this.password = '';
        this.password_confirmation = '';
        this.role = 'user';
        this.errors = {};
    }
}"
@open-modal.window="if ($event.detail === 'create-user-modal') show = true"
@close-modal.window="if ($event.detail === 'create-user-modal') show = false"
@keydown.escape.window="show = false"
x-show="show"
class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
style="display: none;">

    <div x-show="show" class="fixed inset-0 transform transition-all" @click="show = false">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show" 
         class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-md sm:mx-auto"
         @click.away="show = false">
         
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Create New User</h3>
                <button @click="show = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div x-show="successMessage" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                <span x-text="successMessage"></span>
            </div>

            <form @submit.prevent="submitForm">
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" 
                           x-model="name" 
                           id="name" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p x-show="errors.name" class="mt-1 text-sm text-red-600" x-text="errors.name ? errors.name[0] : ''"></p>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" 
                           x-model="email" 
                           id="email" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p x-show="errors.email" class="mt-1 text-sm text-red-600" x-text="errors.email ? errors.email[0] : ''"></p>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" 
                           x-model="password" 
                           id="password" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p x-show="errors.password" class="mt-1 text-sm text-red-600" x-text="errors.password ? errors.password[0] : ''"></p>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" 
                           x-model="password_confirmation" 
                           id="password_confirmation" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select x-model="role" 
                            id="role" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <p x-show="errors.role" class="mt-1 text-sm text-red-600" x-text="errors.role ? errors.role[0] : ''"></p>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" 
                            @click="show = false" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>