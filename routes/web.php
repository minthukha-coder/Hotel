<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckInOrCheckOutController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UiController::class, 'index'])->name('home');

Route::get('/detail/{roomId}', [UiController::class, 'detail'])->name('detail');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');




Route::post('/booking/{roomId}', [BookingController::class, 'store'])->name('booking');

Route::get('/bookingStore/{roomId}', [BookingController::class, 'show'])->name('bookingStore');

Route::post('check_in/{bookId}', [CheckInOrCheckOutController::class, 'checkIn'])->name('check-in');
Route::post('check_out/{checkInId}', [CheckInOrCheckOutController::class, 'checkOut'])->name('check-out');

Route::get('check_in_page', [CheckInOrCheckOutController::class, 'checkInPage'])->name('checkInPage');
Route::get('check_out_page', [CheckInOrCheckOutController::class, 'checkOutPage'])->name('checkOutPage');

//Admin

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


    Route::put('/categories/{categoryId}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categoryId}/delete', [CategoryController::class, 'delete'])->name('categories.delete');


    // Room
    Route::resource('rooms', RoomController::class);

    //Booking

    Route::get('/booking', [BookingController::class, 'index'])->name('bookingIndex');
});
