<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
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
})->name('welcome');


//PROPERTY Routes
Route::get('add/property', [PropertyController::class, 'view'])->name('property');
Route::post('add/property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('property/details/{id}', [PropertyController::class, 'details'])->name('property.details');

//REGISTER ROUTES
Route::post('user/register', [RegisterController::class, 'register_user'])->name('user.register');

//PROFILE ROUTES
Route::get('user/profile/{id}', [ProfileController::class, 'index'])->name('user.profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/map', [App\Http\Controllers\HomeController::class, 'map_view'])->name('dashboard.map');
Route::get('/dashboard/property', [App\Http\Controllers\HomeController::class, 'property_view'])->name('dashboard.property');
Route::get('/dashboard/rent/list', [App\Http\Controllers\HomeController::class, 'rent_list'])->name('dashboard.rent.list');
Route::get('/dashboard/inspection', [App\Http\Controllers\HomeController::class, 'inspection'])->name('dashboard.inspection');
Route::post('menu/update-order', [App\Http\Controllers\HomeController::class, 'updateOrder'])->name('drag_drop');

//ADMIN ROUTES
Route::get('/property/navigate/{id}', [PropertyController::class, 'navigate'])->name('property.navigate');
Route::get('/property/inspection/{id}', [PropertyController::class, 'inspection'])->name('property.inspection');
Route::post('/property/inspection/update', [PropertyController::class, 'inspection_update'])->name('inspection.update');

// ORDER ROUTES
Route::post('/order', [OrdersController::class, 'store'])->name('order.store');
Route::get('/search', [OrdersController::class, 'search'])->name('search');
//Mail
Route::get('/send/mail/{id}', [OrdersController::class, 'mail_send'])->name('rent.mail');

//PROFILE ROUTES
Route::get('user/profile/update/{id}', [ProfileController::class, 'update'])->name('user.profile.update');
Route::post('user/profile/store', [ProfileController::class, 'store'])->name('profile.store');

Route::get('user/payment/{id}', [ProfileController::class, 'payment_details'])->name('payment.details');
