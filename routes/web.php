<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users.index');
    Route::get('/admin/recipes', [AdminController::class, 'viewRecipes'])->name('admin.recipes.index');
    Route::get('/admin/download-users', [AdminController::class, 'downloadUsers'])->name('admin.download.users');
    Route::get('/admin/download-recipes', [AdminController::class, 'downloadRecipes'])->name('admin.download.recipes');
    Route::delete('/admin/recipe/{id}', [AdminController::class, 'deleteRecipe'])->name('admin.recipe.delete');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.show');
    Route::get('/reseps/create', [ResepController::class, 'create'])->name('reseps.create'); // Form Upload
    Route::post('/resep', [ResepController::class, 'store'])->name('resep.store'); // Simpan Resep
    Route::get('/resep/{id}/edit', [ResepController::class, 'edit'])->name('resep.edit'); // Form Edit
    Route::put('/resep/{id}', [ResepController::class, 'update'])->name('resep.update'); // Update Resep
    Route::delete('/resep/{id}', [ResepController::class, 'destroy'])->name('resep.destroy'); // Hapus Resep

    
    Route::post('/like/{id}', [ResepController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/reseps/{id}/comment', [ResepController::class, 'storeComment'])->name('reseps.comment');  
    Route::delete('/comments/{id}', [ResepController::class, 'destroyComment'])->name('comments.destroy');
   
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/search', [SearchController::class, 'storeSearchQuery'])->name('search.storeSearchQuery');
    Route::delete('/history/{id}', [SearchController::class, 'deleteHistory'])->name('history.delete');

        // Halaman koleksi resep
    Route::get('/bookmark', [CollectionController::class, 'index'])->name('collection.index');

    // Simpan resep ke koleksi
    Route::post('/bookmark/{id}', [CollectionController::class, 'store'])->name('collection.store');

    // Hapus resep dari koleksi
    Route::delete('/bookmark/{id}', [CollectionController::class, 'destroy'])->name('collection.destroy');

    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account', [AccountController::class, 'index'])->middleware('auth')  ->name('account.index');

    Route::get('/resep/{id}/download-pdf', [ResepController::class, 'downloadPDF'])->name('resep.downloadPDF');

});









