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

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::middleware('jwt.refresh')->get('refresh', 'AuthController@refresh');
    Route::middleware('jwt.auth')->group(function () {
        Route::get('user', 'UserController@whoami');
    });
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('user', 'UserController@whoami');
    Route::apiResource('nodes', 'NodeController');
});