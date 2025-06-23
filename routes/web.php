<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
    return view('auth.forgotpassword');
    })->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.update');
    Route::get('/reset-password', function () {
        return view('auth.resetpassword');
    })->name('reset-password');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Client

Route::middleware(['auth'])->get('/', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => view('dashboard.dashboard'),
        'team' => view('dashboard.team_dashboard'),
        'client' => view('dashboard.client_dashboard'),
        default => abort(403),
    };
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});    

//Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
    // List all users
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');
    Route::post('/user/toggle-status/{id}', [UsersController::class, 'toggleStatus'])->name('admin.user.toggleStatus');
    Route::post('/user/send-reset-link/{id}', [UsersController::class, 'sendResetLink'])
    ->name('admin.user.sendResetLink');

    // Show create form
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');

    // Store users
    Route::post('/users', [UsersController::class, 'store'])->name('user.store');

    // Show edit form
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('user.edit');

    // Update users
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('user.update');

    // Delete users
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
    // packages 
    Route::resource('/packages', PackageController::class)->names('packages');


});
});