<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', [AdminController::class, 'Beranda'])->name('beranda');
Route::get('/about', [AboutController::class, 'Index'])->name('about');
Route::get('/produk', [ProductController::class, 'Index'])->name('produk');
Route::get('/produk/detail/{id}', [ProductController::class, 'Detail'])->name('produk.detail');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::get('/toko/detail/{id}', [StoreController::class, 'Detail'])->name('toko.detail');
Route::get('/toko', [StoreController::class, 'Index'])->name('toko');

// Admin Route
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    
    Route::get('/admin/user', [AdminController::class, 'User'])->name('user');
    Route::post('/admin/user/create', [UserController::class, 'Store'])->name('user.store');
    Route::put('/admin/user/update/{id}', [UserController::class, 'Update'])->name('user.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'Delete'])->name('user.delete');
    
    Route::get('/admin/toko', [AdminController::class, 'Toko'])->name('toko.admin');
    Route::post('/admin/toko/create', [StoreController::class, 'Store'])->name('toko.admin.store');
    Route::post('/admin/toko/update/{id}', [StoreController::class, 'Update'])->name('toko.admin-update');
    Route::get('/admin/toko/delete/{id}', [StoreController::class, 'Delete'])->name('toko.admin.delete');
    
    Route::get('/admin/kategori', [AdminController::class, 'Kategori'])->name('kategori.admin');
    Route::post('/admin/kategori/create', [CategoryController::class, 'Store'])->name('kategori.admin.store');
    Route::post('/admin/kategori/update/{id}', [CategoryController::class, 'Update'])->name('kategori.admin.update');
    Route::get('/admin/kategori/delete/{id}', [CategoryController::class, 'Delete'])->name('kategori.admin.delete');
    
});

// Member Route
Route::middleware(['member'])->group(function () {
    Route::get('/toko/toko-member', [StoreController::class, 'TokoMember'])->name('toko.member');
    Route::post('/toko/create', [StoreController::class, 'TokoMemberCreate'])->name('toko.member.store');
    Route::post('/toko/update/{id}', [StoreController::class, 'TokoMemberUpdate'])->name('toko.member.update');
    Route::post('/produk/create', [ProductController::class, 'Store'])->name('produk.store');
    Route::get('/produk/create', [ProductController::class, 'Create'])->name('produk.create');
    Route::get('/produk/delete/{id}', [ProductController::class, 'Delete'])->name('produk.delete');
    Route::post('/produk/update/{id}', [ProductController::class, 'Update'])->name('produk.update');
});

// Authentication Route
Route::get('/login', [AuthController::class, 'Index'])->name('login');
Route::post('/login', [AuthController::class, 'Authentication'])->name('login.post');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'Regist'])->name('register.post');