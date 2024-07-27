<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusCountroller;


Route::middleware('api')->post('/users', [UserController::class, 'store']);
Route::middleware('api')->post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user-protected', [UserController::class, 'protectedRoute']);

//Routes for Status
Route::middleware('api')->get('/status',[StatusController::class,'index']);
Route::middleware('api')->post('/status',[StatusController::class,'store']);
Route::middleware('api')->put('/status/{id}',[StatusController::class,'update']);
Route::middleware('api')->delete('/status/{id}',[StatusController::class,'destroy']);


//add route

//get route

//delete route

//update route


//Routes for Priority

//add route

//get route

//delete route

//update route
