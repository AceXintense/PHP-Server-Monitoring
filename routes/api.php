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

Route::post('/initializeServer', 'ServerController@initializeServer');
Route::post('/uploadCPU', 'ServerController@uploadCPU');
Route::get('/getServerList', 'ServerController@getServerList');
Route::post('/getCPU', 'ServerController@getCPU');
Route::post('/getCPUFrequency', 'ServerController@getCPU');