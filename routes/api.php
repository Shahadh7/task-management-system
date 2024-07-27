<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriorityController;


Route::middleware('api')->post('/users', [UserController::class, 'store']);
Route::middleware('api')->post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user-protected', [UserController::class, 'protectedRoute']);

//Routes for Status

//add route

//get route

//delete route

//update route


//Routes for Priority

//add route

//get route

//delete route

//update route

Route::middleware('auth:sanctum')->get('/priorities', [PriorityController::class, 'index']);
Route::middleware('auth:sanctum')->get('/priorities/{id}', [PriorityController::class, 'show']);

Route::middleware('auth:sanctum')->post('/priorities', [PriorityController::class, 'store']);
Route::middleware('auth:sanctum')->put('/priorities/{id}', [PriorityController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/priorities/{id}', [PriorityController::class, 'destroy']);


