<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlacklistedClientController;
use App\Http\Controllers\IssueController;

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
//Route::post('/users', [UserController::class, 'store'])->name('users.store');

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

Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/search', [IssueController::class, 'search'])->name('issues.search');
Route::post('/issues/store', [IssueController::class, 'store'])->name('issues.store');
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/update/{id}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/issues/destroy/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');

//Add a user with role
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::post('/admin/users', [UserController::class, 'store'])
        ->name('admin.users.store');
});


Route::get('/issues/export/csv', [IssueController::class, 'exportCsv'])->name('issues.export.csv');
//Route::get('/issues/export/excel', [IssueController::class, 'exportExcel'])->name('issues.export.excel');
Route::get('/issues/export/pdf', [IssueController::class, 'exportPdf'])->name('issues.export.pdf');

