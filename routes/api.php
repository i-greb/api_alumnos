<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace'=> 'App\Http\Controllers'], function(){
    Route::apiResource('career',CareerController::class);
    Route::apiResource('municipality',MunicipalityController::class);
    Route::apiResource('profile',ProfileController::class);
    Route::apiResource('role',RoleController::class);
    Route::apiResource('state',StateController::class);
    Route::apiResource('student',StudentController::class);
    Route::apiResource('town',TownController::class);






});
