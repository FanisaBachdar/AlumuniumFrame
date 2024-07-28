<?php


use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardNotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// -----------------------------------------------------------
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home',
        "name" => "Toko Alumunium Frame",
        "image" => "banner_home.png"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Toko Alumunium Frame",
        "email" => "alumuniumFrame026@gmail.com",
        "image" => "toko.jpg"
    ]);
});
// ------------------------------------------------------

Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->middleware('auth');
// -----------------------------------------------------------
// ===========================================================
// Rute login untuk pelanggan
Route::get('/login/customer', [LoginController::class, 'indexCustomer'])->name('login.customer')->middleware('guest');
Route::post('/login/customer', [LoginController::class, 'authenticateCustomer']);
Route::post('/logout/customer', [LoginController::class, 'logoutCustomer']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// -----------------------------------------------------------
// Rute registrasi untuk pelanggan
Route::get('/register/customer', [RegisterController::class, 'indexCustomer'])->middleware('guest');
Route::post('/register/customer', [RegisterController::class, 'storeCustomer']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// -----------------------------------------------------------
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware(['auth', 'nocustomer']);
// -----------------------------------------------------------
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware(['auth', 'nocustomer']);

// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/colections', [DashboardPostController::class, 'colections'])->middleware('owner'); 
Route::get('/dashboard/report', [DashboardOrderController::class, 'report'])->middleware('owner');
Route::get('/dashboard/laporanNota', [DashboardNotaController::class, 'laporanNota'])->middleware('owner');

Route::resource('/dashboard/orders', DashboardOrderController::class)->middleware(['auth', 'nocustomer']);
Route::patch('/orders/{order}/status', [DashboardOrderController::class, 'updateStatus'])->name('orders.updateStatus')->middleware('auth');

Route::resource('/dashboard/notas', DashboardNotaController::class)->middleware(['auth', 'nocustomer']);

Route::get('/orders', function () {
    return view('orders.index', [
        "title" => "Order",
        "active" => 'orders'
    ]);
});

Route::post('/order', [OrderController::class, 'store'])->name('order.store')->middleware(['auth', 'justcustomer']);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware(['auth', 'justcustomer']);









