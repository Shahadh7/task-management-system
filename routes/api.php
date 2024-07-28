<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;


Route::middleware('api')->post('/users', [UserController::class, 'store']);
Route::middleware('api')->post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user-protected', [UserController::class, 'protectedRoute']);


Route::middleware('auth:sanctum')->get('/statuses',[StatusController::class,'index']);
Route::middleware('auth:sanctum')->post('/statuses',[StatusController::class,'store']);
Route::middleware('auth:sanctum')->put('/statuses/{id}',[StatusController::class,'update']);
Route::middleware('auth:sanctum')->delete('/statuses/{id}',[StatusController::class,'destroy']);



