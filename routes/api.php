<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\FileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::middleware(['throttle:3'])->get('files',[FileController::class,'index']);
    Route::post('files',[FileController::class,'store']);
    Route::delete('files/{file}',[FileController::class,'destroy']);
    Route::delete('files-delete/{file}',[FileController::class,'forceDelete']);
    Route::post('logout',[AuthController::class,'logout']);
});

// rutas de auth
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
