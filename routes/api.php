<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\TPSController;

Route::get('/tps', [TPSController::class, 'index']);
Route::get('/tps/create', [TPSController::class, 'create']);
Route::post('/tps', [TPSController::class, 'store']);
Route::get('/tps/{tps}', [TPSController::class, 'show']);
Route::get('/tps/{tps}/edit', [TPSController::class, 'edit']);
Route::put('/tps/{tps}', [TPSController::class, 'update']);
Route::delete('/tps/{tps}', [TPSController::class, 'destroy']);