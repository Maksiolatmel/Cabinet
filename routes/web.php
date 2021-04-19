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
// Dashboard
Route::get('/', function () {
    return view('pages.pult');
});

Route::get('/poryadok', function () {
    return view('pages.poryadok');
});

Route::get('/help', function () {
    return view('pages.help');
});

Route::get('/golosyvannia', function () {
    return view('pages.golosyvannia');
});

Route::get('/rishennya', function () {
    return view('pages.rishennya');
});

Route::get('/stat-vidviduvannja', function () {
    return view('pages.stat-vidviduvannja');
});


Route::get('/stat-golosuvannya', function () {
    return view('pages.stat-golosuvannya');
});
// Fogot-password
Route::get('/fogot-pass','ForgotPasswordController@present');


Route::get('/sms_confirm', function () {
    return view('pages.sms_confirm');
});

Route::get('/delete_user', 'HomeController@deleteUser','id')->name('deleteUser');

//Auth::routes();

Route::get('login', function () {
    return view('pages.login_form');
});

// Authentication Routes...

Route::get('/login_form', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/profile', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/userlist', 'HomeController@list')->name('list');

Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('/fogot_pass', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

