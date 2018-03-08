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
    Route::get('login', function () {
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser(\App\User::find(1));
        $r = new \Illuminate\Http\Response($token);

        return $r->header('Authorization', 'Bearer '.$token);
    });
    Route::post('login', function () {
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser(\App\User::find(1));
        $r = new \Illuminate\Http\Response();

        return $r->header('Authorization', 'Bearer '.$token);
    });
    Route::middleware('jwt.refresh')->get('refresh', function () {
        return new \Illuminate\Http\Response();
    });
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('whoami', 'UserController@whoami');
    Route::apiResource('nodes', 'NodeController');
});