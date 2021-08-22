<?php

use App\Http\Controllers\Api\EmplyeeDataController;
use App\Http\Controllers\Api\EmplyeeController;
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


Route::get('/employees/countries',[EmplyeeDataController::class,'countries']);
Route::get('/employees/{country}/state',[EmplyeeDataController::class,'states']);
Route::get('/employees/{state}/city',[EmplyeeDataController::class,'city']);
Route::get('/employees/departments',[EmplyeeDataController::class,'departments']);



Route::get('/employees',[EmplyeeController::class,'index']);
Route::post('/employees',[EmplyeeController::class,'store']);