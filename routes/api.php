<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;


Route::middleware('api')->post('/users', [UserController::class, 'store']);
Route::middleware('api')->post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-protected', [UserController::class, 'protectedRoute']);
    Route::get('/statuses',[StatusController::class,'index']);
    Route::post('/statuses',[StatusController::class,'store']);
    Route::put('/statuses/{id}',[StatusController::class,'update']);
    Route::delete('/statuses/{id}',[StatusController::class,'destroy']);
});












