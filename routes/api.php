<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FarmerAuthController;



// Route::prefix('farmer')->group(function () {
    Route::post('register', [FarmerAuthController::class, 'register']);
    Route::post('login', [FarmerAuthController::class, 'login']);

    Route::middleware('auth:farmer')->group(function () {
        Route::post('logout', [FarmerAuthController::class, 'logout']);
        Route::get('profile', function (Request $request) {
            return response()->json($request->user());
        });
    });
// });

// Route::post('/register', function (Request $request) {
//     // return $request->user();
//     // dd($request->all());
// });
