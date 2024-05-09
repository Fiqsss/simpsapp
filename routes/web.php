<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    // Routing login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Routing logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Routing produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/{id}/delete', [ProdukController::class, 'deleteproduk'])->name('produk.delete');

    // Routing profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Routing Search
    Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');
    Route::get('/produk/kategori', [ProdukController::class, 'searchdropdown'])->name('searchdropdown');

    // Routing ekspor data produk ke Excel
    Route::get('/produk/export', [ExportController::class, 'exportToExcel'])->name('produk.export');
});

// Routing Root
Route::middleware('guest')->get('/', function () {
    return redirect('/login');
});

