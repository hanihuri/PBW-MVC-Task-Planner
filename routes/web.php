<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/selesai/{id}', [TaskController::class, 'selesai']);
Route::get('/tasks/delete/{id}', [TaskController::class, 'delete']);
Route::post('/categories', [TaskController::class, 'storeCategory']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update/{id}', [TaskController::class, 'update']);