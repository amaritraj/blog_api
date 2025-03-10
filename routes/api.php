<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('message', function () {
//     return response()->json([
//         'message' => 'Welcome to Laravel API'
//     ]);
// });

// Route::get('category', [CategoryController::class, 'index']);
// Route::post('category/store', [CategoryController::class, 'store']);


// Api Resource Route
Route::apiResource('categories', CategoryController::class);
