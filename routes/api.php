<?php


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

Route::middleware('node.auth')->namespace('Agent')->prefix('agent')->group(function () {
    Route::get('whoami', 'NodeController@whoami');
    Route::apiResource('containers', 'ContainerController');
    Route::get('ping', 'AppController@ping');
});
