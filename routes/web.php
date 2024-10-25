<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'main']);
Route::post('/create-user', [UserController::class, 'store']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/companies', [CompanyController::class, 'main']);
Route::post('/create-company', [CompanyController::class, 'store']);
Route::delete('/company/{id}', [CompanyController::class, 'delete']);
Route::get('/company/{id}', [CompanyController::class, 'show']);

Route::get('/products', [ProductController::class, 'main']);
Route::post('/create-product', [ProductController::class, 'store']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/laravel', function () {
    return view('welcome');
});
