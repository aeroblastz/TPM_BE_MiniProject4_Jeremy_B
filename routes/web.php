<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\TodoApi;
use Illuminate\Support\Facades\Route;


Route::get('/show', [AuthController::class, 'welcome'])->name('welcome');
