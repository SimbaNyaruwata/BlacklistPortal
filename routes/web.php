<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlacklistedClientController;

// Redirect root URL to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Middleware-protected dashboard route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BlacklistedClientController::class, 'index'])->name('dashboard');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Ajax: Fetch filtered data
Route::get('dashboard/search', [BlacklistedClientController::class, 'search'])->name('search');


// Show the create form (modal or page)
Route::get('/clients/create', [BlacklistedClientController::class, 'create'])->name('clients.create');

// Store a new client
Route::post('/dashboard', [BlacklistedClientController::class, 'store'])->name('dashboard.store');

// Show the edit form
Route::get('/dashboard/{client}/edit', [BlacklistedClientController::class, 'edit'])->name('dashboard.edit');

// Update the client
Route::put('/dashboard/{client}', [BlacklistedClientController::class, 'update'])->name('dashboard.update');

// Delete a client
Route::delete('/dashboard/destroy/{client}', [BlacklistedClientController::class, 'destroy'])->name('dashboard.destroy');
