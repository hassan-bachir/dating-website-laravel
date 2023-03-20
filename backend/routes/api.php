<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::group(["middleware" => "auth:api"], function () {
    Route::post('users', [UserController::class, 'getUsers']);
    Route::post('favorites', [UserController::class, 'getFavorites']);
    Route::post('addFavorite', [UserController::class, 'addFavorite']);
    Route::post('removeFavorite', [UserController::class, 'removeFavorite']);
    Route::post('blockUser', [UserController::class, 'blockUser']);
    Route::post('removeBlock', [UserController::class, 'removeBlock']);
    Route::post('editProfile', [UserController::class, 'editProfile']);

});

