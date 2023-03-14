<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('clients/{client}', 'App\Http\Controllers\Api\ClientController@show');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
