<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\AdminCheckout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pages', function () {
    return view('pages.index');
})->name('pages.index');
// Route::get('login', function () {
//     return view('login');
// })->name('login');
// Route::get('/pages/checkout/{camp:slug}', function () {
//     return view('pages.checkout');
// })->name('pages.checkout');
Route::middleware('auth')->group(function() {
    Route::get('/checkout/success-checkout', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('/checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    Route::post('/checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');
    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // dashboard user
    Route::prefix('users/dashboard')->namespace('User')->name('users.')->middleware('ensureUserRole:user')->group(function() {
        Route::get('/', [UserDashboard::class , 'index'])->name('dashboard');
    });
    // dashboard admin
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function() {
        Route::get('/', [AdminDashboard::class , 'index'])->name('dashboard');
        Route::post('checkout/{checkout}', [AdminCheckout::class , 'update'])->name('checkout.update');
    });
});
// socialite route
Route::get('sign-in-google', [UserController::class, 'google'])->name('auth.sign-in');
Route::get('/auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('auth.sign-in.callback');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
