<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Clients
Route::prefix('admin')->name('admin.')->group(function () {

    // List all users
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');

    // Show create form
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');

    // Store users
    Route::post('/', [UsersController::class, 'store'])->name('user.store');

    // Show edit form
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');

    // Update users
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('user.update');

    // Delete users
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

});