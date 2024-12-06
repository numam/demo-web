<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/artikel', App\Http\Controllers\Api\ArtikelController::class);
Route::apiResource('/tag', App\Http\Controllers\Api\TagController::class);
