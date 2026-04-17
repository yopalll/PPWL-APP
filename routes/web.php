<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/users');

Route::resource('users', UserController::class)->except(['show']);
Route::resource('products', ProductController::class)->except(['show']);
