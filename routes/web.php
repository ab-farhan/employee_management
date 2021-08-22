<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::group(['middleware'=>'auth'],function(){
   

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('users',UserController::class);
    Route::post('users/{user}/change-password', [ChangePasswordController::class, 'changePassword'])->name('users.change.password');

    Route::resource('/country',CountryController::class);
    Route::resource('/state',StateController::class);
    Route::resource('/city',CityController::class);
    Route::resource('/department',DepartmentController::class);


    Route::get('{any}',function(){
        return view('employee.index');
    })->where('any','.*');

});




