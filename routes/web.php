<?php

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

Route::get('/', 'UserController@index');


Route::resource('user', 'UserController');
Route::get('user/{user}/sms', 'UserController@sms');
Route::get('user/{user}/paymentslip', 'UserController@paymentSlip');

Route::resource('sms', 'SmsController')->except([
    'edit', 'update', 'destroy', 'show'
]);
Route::get('sms/{id}/user', 'SmsController@user');
Route::get('sms/{user}/create', 'SmsController@createWithUser')->name('sms.user.create');

Route::resource('paymentslip', 'PaymentSlipController')->except([
    'show'
]);
