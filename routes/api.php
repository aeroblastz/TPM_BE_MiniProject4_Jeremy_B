<?php

use App\Http\Controllers\Api\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoApi;
use App\Http\Controllers\Controller;

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::get('/', [Controller::class, 'web']);

Route::middleware('auth:api')->group(function () {
    Route::get('/todos', [TodoApi::class, 'index']);
    Route::post('/todos', [TodoApi::class, 'save']);
    Route::put('/todos/{id}', [TodoApi::class, 'update']);
    Route::delete('/todos/{id}', [TodoApi::class, 'delete']);
});
