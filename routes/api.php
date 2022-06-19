<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [ClientController::class,'listAll']);
Route::post('/users', [ClientController::class,'store']);
Route::put('/users', [ClientController::class,'update']);
Route::get('/users/{id}', [ClientController::class,'find']);
Route::delete('/users/{id}', [ClientController::class,'delete']);
Route::get('/billingclient/{cpf}', [BillingController::class,'listAll']);
Route::post('/billing', [BillingController::class,'insert']);
Route::put('/billing', [BillingController::class,'update']);
Route::delete('/billing/{id}', [BillingController::class,'delete']);
Route::get('/billing/{cpf}', [BillingController::class,'find']);
