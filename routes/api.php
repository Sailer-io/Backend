<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function (){
    Route::get('login', function (){
        $token=\Tymon\JWTAuth\Facades\JWTAuth::fromUser(\App\User::find(1));
        $r=new \Illuminate\Http\Response($token);
        return $r->header('Authorization', 'Bearer '.$token);
    });
    Route::middleware('jwt.refresh')->get('refresh', function (){
        return new \Illuminate\Http\Response();
    });
});


Route::middleware('jwt.auth')->group(function (){
    Route::get('whoami', 'UserController@whoami');
    Route::apiResource('nodes', 'NodeController');
});

Route::middleware('node.auth')->namespace('Agent')->prefix('agent')->group(function (){
    Route::get('whoami', 'NodeController@whoami');
    Route::apiResource('containers', 'ContainerController');
});