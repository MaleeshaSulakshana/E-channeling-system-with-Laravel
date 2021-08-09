<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Patient\DashboardController;

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

Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [ApiController::class, 'login']);
    Route::post('/register', [ApiController::class, 'register']);
    Route::get('/refresh', [ApiController::class, 'refresh']);
    Route::post('/logout', [ApiController::class, 'logout']);
    Route::get('/user_profile', [ApiController::class, 'userProfile']);
    Route::get('/user_dashboard', [ApiController::class, 'index']);  
    Route::get('/all_doctors', [ApiController::class, 'getAllDoctors']);  
    Route::get('/all_departments', [ApiController::class, 'getAllDepartments']);  
    Route::get('/department_profile/{id}', [DashboardController::class, 'getDepartmentProfile']);  
    Route::get('/doctor_profile/{id}', [DashboardController::class,'getDoctorProfile']);  
    Route::get('/appointment-count', [ApiController::class,'getPatientAppoitmentCount']);  
});
