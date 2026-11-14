<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/layanan/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/konsultasi', [ContactController::class, 'consultation'])->name('contact.consultation');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('user.login');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))->name('user.dashboard');
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/berlangganan', [OrderController::class, 'subscribe'])->name('subscriptions.create');
    Route::get('/pesanan/buat', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/pesanan', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/pembayaran', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/pembayaran', [PaymentController::class, 'store'])->name('payments.store');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('layanan', Admin\ServiceController::class)
        ->parameters(['layanan' => 'service'])
        ->names('services')
        ->except(['show']);

    Route::resource('kategori-produk', Admin\ProductCategoryController::class)
        ->parameters(['kategori-produk' => 'productCategory'])
        ->names('product-categories')
        ->except(['show']);

    Route::resource('produk', Admin\ProductController::class)
        ->parameters(['produk' => 'product'])
        ->names('products')
        ->except(['show']);

});