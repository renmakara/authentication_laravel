<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);

// Protected route
Route::group
(
    [
        "middleware"=>["auth:sanctum"]
    ],
    function ()
    {
        Route::get('/profile', [ApiController::class, 'profile']);
        Route::get('/logout', [ApiController::class, 'logout']);
        Route::get('/refresh-token', [ApiController::class, 'refreshToken']);
    }
);
