<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//to add, middleware of authorization with jwt
Route::get('/', function () {
    return view('app');
});
Route::post('/login', [AuthController::class,'login']);
