<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Blogs
Route::prefix('blogs')->name('blogs.')->group(function () {

    // List all blogs
    Route::get('/', [BlogController::class, 'index'])->name('index');

    // List all blogs categories
    Route::get('/categories', [BlogController::class, 'showCategories'])->name('categories');

    // List all blogs tags
    Route::get('/tags', [BlogController::class, 'showTags'])->name('tags');

    // Show create form
    Route::get('/create', [BlogController::class, 'create'])->name('create');

    // Store blog
    Route::post('/', [BlogController::class, 'store'])->name('store');

    // Show edit form
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');

    // Update blog
    Route::put('/{id}', [BlogController::class, 'update'])->name('update');

    // Delete blog
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');

});

//Services
Route::prefix('services')->name('service.')->group(function () {

    // List all Services
    Route::get('/', [ServicesController::class, 'index'])->name('index');

    // List all service categories
    Route::get('/categories', [ServicesController::class, 'showCategories'])->name('categories');

    // Show service form
    Route::get('/create', [ServicesController::class, 'create'])->name('create');

    // Store service
    Route::post('/', [ServicesController::class, 'store'])->name('store');

    // Show service form
    Route::get('/{id}/edit', [ServicesController::class, 'edit'])->name('edit');

    // Update service
    Route::put('/{id}', [ServicesController::class, 'update'])->name('update');

    // Delete service
    Route::delete('/{id}', [ServicesController::class, 'destroy'])->name('destroy');

});