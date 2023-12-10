<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'Profile'])->middleware('role')->name('profile');


Route::get('/admin-home', function () {
    return view('admin-home');
})->middleware(['auth', 'role:admin']);

Route::get('/penyewa-home', function () {
    return view('penyewa-home');
})->middleware(['auth', 'role:penyewa']);



// User Management
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management');

// Driver Management
Route::get('/driver-management', [DriverManagementController::class, 'index'])->name('driver.management');

// Payment Management
Route::get('/payment-management', [PaymentManagementController::class, 'index'])->name('payment.management');

// Car Management
Route::get('/car-management', [CarManagementController::class, 'index'])->name('car.management');

// Car controller
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}', [App\Http\Controllers\CarController::class, 'show'])->name('cars.show');
Route::get('/cars1', [App\Http\Controllers\CarController::class, 'index1'])->name('cars1.index');
Route::get('/cars1/{car}', [App\Http\Controllers\CarController::class, 'show1'])->name('cars1.show');


// Driver controller
Route::get('drivers', [App\Http\Controllers\DriverController::class, 'index'])->name('driver.index');
Route::get('drivers1', [App\Http\Controllers\DriverController::class, 'index1'])->name('driver1.index');
Route::get('/drivers/create', [App\Http\Controllers\DriverController::class, 'create'])->name('driver.create');
Route::post('/drivers/store', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.store');
Route::get('/drivers/{driver}/edit', [App\Http\Controllers\DriverController::class, 'edit'])->name('driver.edit');
Route::delete('/drivers/{driver}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('driver.destroy');

// Users controller
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users1', [App\Http\Controllers\UsersController::class, 'index1'])->name('users1.index');
Route::get('/users1/create1', [App\Http\Controllers\UsersController::class, 'create1'])->name('users1.create');
Route::post('/users1/store1', [App\Http\Controllers\UsersController::class, 'store1'])->name('users1.store');

// Payment controller
Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/edit/{id}', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/update/{id}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update');
// Penyewa Index
Route::get('/payments1', [App\Http\Controllers\PaymentController::class, 'index1'])->name('payments1.index');


// Rental controller
Route::get('/rentals', [App\Http\Controllers\RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [App\Http\Controllers\RentalController::class, 'create'])->name('rentals.create');
Route::get('/rentals/alert', [App\Http\Controllers\RentalController::class, 'alert'])->name('rentals.alert');
Route::post('/rentals/store', [App\Http\Controllers\RentalController::class, 'store'])->name('rentals.store');
// Rental Penyewa
Route::get('/rentals1', [App\Http\Controllers\RentalController::class, 'index1'])->name('rentals1.index');
Route::get('/rentals1/create', [App\Http\Controllers\RentalController::class, 'create1'])->name('rentals1.create');
Route::get('/rentals1/alert', [App\Http\Controllers\RentalController::class, 'alert1'])->name('rentals1.alert');
Route::post('/rentals1/store', [App\Http\Controllers\RentalController::class, 'store1'])->name('rentals1.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/rentals', [App\Http\Controllers\RentalController::class, 'index'])->name('rentals.index');
    Route::get('/rentals/create', [App\Http\Controllers\RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals/store', [App\Http\Controllers\RentalController::class, 'store'])->name('rentals.store');
});

