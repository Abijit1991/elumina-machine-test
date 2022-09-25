<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show-customer-form', 'Admin\HomeController@index');

//admin
Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/review-customer-profiles', 'Admin\CustomerController@reviewCustomerProfiles')->name('admin.review.customer.profiles');
    Route::get('/update-customer-profile-status/{custId}/{statusId}', 'Admin\CustomerController@updateCustomerProfileStatus')->name('admin.update.customer.profile.status');
    Route::get('/customer-profiles', 'Admin\CustomerController@customerProfiles')->name('admin.customer.profiles');
});

//customer
Route::prefix('customer')->middleware(['auth', 'can:isCustomer'])->group(function () {
    Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
});

// Customer Registration
Route::get('/customer-registration-form', 'Customer\RegisterController@registrationForm')->name('customer.registration.form');
Route::post('/customer-create', 'Customer\RegisterController@createCustomer')->name('customer.create');
Route::get('/customer-home/{custId}', 'Customer\RegisterController@displayMessage')->name('customer.display.message');

// Admin Login From
Route::post('/user-login', 'LoginController@authenticateUserLogin')->name('user.login');
