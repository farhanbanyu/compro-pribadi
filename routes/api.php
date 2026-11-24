<?php

use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/tables', [ApiDataController::class, 'tables']);
Route::get('/data/{table}', [ApiDataController::class, 'index']);
Route::get('/show/{table}/{url}', [ApiDataController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
