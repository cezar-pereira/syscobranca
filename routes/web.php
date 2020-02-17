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

Route::get('/', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login/do', 'AuthController@loginDo')->name('login.do');
Route::get('/login', 'AuthController@showLoginForm')->name('loginForm');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('user', 'UserController');
    // Route::get('user/{user}/sms', 'UserController@sms'); //sem uso
    // Route::get('user/{user}/paymentslip', 'UserController@paymentSlip'); //sem uso

    Route::resource('sms', 'SmsController')->except([
        'edit', 'update', 'destroy', 'show'
    ]);
    // Route::get('sms/{id}/user', 'SmsController@user'); //sem uso
    Route::get('sms/{user}/create', 'SmsController@createWithUser')->name('sms.user.create');

    Route::resource('paymentslip', 'PaymentSlipController')->except([
        'show'
    ]);
});
