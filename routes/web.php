<?php

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

Route::redirect('/', '/login');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
   Route::get('home', [\App\Http\Controllers\HomeController::class, 'index']);
   Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
   });
});