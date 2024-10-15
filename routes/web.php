<?php

use App\Http\Controllers\acceuilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantPageController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\publicitController;
use App\Http\Controllers\SignRestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;



Route::get('/', action: [FirstController::class, 'index'])->name('first');
// Route::get('/auth', action: [AuthController::class, 'index'])->name('authentication');
Route::get('/Connexion', [AuthController::class, 'index'])->name('authentication');
Route::get('/menu', [menuController::class, 'index'])->name('menu');


Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'logine'])->name('logine');
// Route::get('/login', [MainController::class, 'home'])->name('logine');

Route::middleware(['auth'])->group(function () {
});
    
    Route::get('/publicit', [publicitController::class, 'index'])->name('publicit');

    Route::get('/home', [MainController::class, 'home'])->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/checkup', [SaleController::class, 'checkup'])->name('checkup');

    Route::post('/checkup_show', [SaleController::class, 'checkup_show'])->name('checkup_show');

    Route::get('/invoices/download/{id}', [InvoiceController::class, 'download'])->name('invoices.download');

    Route::patch('/update-quantity', [ProductController::class, 'updateQuantity'])->name('updateQuantity');

    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');

    Route::get('/stats', [ChartController::class, 'statPerMonths'])->name('statPerMonths');

    Route::resource('/categories', CategoryController::class);

    Route::resource('/products', ProductController::class);

    Route::resource('/sales', SaleController::class);

    Route::resource('/auth', AuthController::class);

    // 

    Route::post('/restaurant/sign_up', [SignRestoController::class, 'store'])->name('restaurant.store');
    
    Route::get('/restaurant/sign_up', [SignRestoController::class, 'success']);

    Route::get('/signup', [SignRestoController::class, 'index'])->name('signup');

    Route::get('/restaurant', [RestaurantPageController::class, 'index'])->name('restaurantPage');
!    Route::get('/restaurant/passCommand', action: [RestaurantPageController::class, 'show'])->name('passCommand');
    
