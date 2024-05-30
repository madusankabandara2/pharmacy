<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('role:owner,manager,cashier')->group(function () {
        Route::get('medications', [MedicationController::class, 'index']);
        Route::get('customers', [CustomerController::class, 'index']);
    });

    Route::middleware('role:manager,cashier')->group(function () {
        Route::post('medications/{id}', [MedicationController::class, 'update']);
        Route::post('customers/{id}', [CustomerController::class, 'update']);
    });

    Route::middleware('role:owner,manager')->group(function () {
        Route::delete('medications/{id}', [MedicationController::class, 'destroy']);
        Route::delete('customers/{id}', [CustomerController::class, 'destroy']);
    });

    Route::middleware('role:owner')->group(function () {
        Route::resource('medications', MedicationController::class)->except(['index']);
        Route::resource('customers', CustomerController::class)->except(['index']);
        Route::delete('medications/{id}/permanent', [MedicationController::class, 'forceDelete']);
        Route::delete('customers/{id}/permanent', [CustomerController::class, 'forceDelete']);
    });
});
