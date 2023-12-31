<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/siswa',[PostController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/siswa',[PostController::class, 'store'])->middleware(['auth:sanctum']);

Route::patch('/siswa/{id}',[PostController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/siswa/{id}',[PostController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::post('/siswa/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);
