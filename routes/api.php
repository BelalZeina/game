<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('lang')->group(function () {
Route::post('/register' , [AuthController::class , 'register']);
Route::post('/login' , [AuthController::class , 'login']);
Route::post('/logout' , [AuthController::class , 'logout'])->middleware("auth:sanctum");


// ========================= routes auth driver ========================================
Route::middleware('auth:sanctum')->group(function () {

    // auth user
    Route::group(['prefix' => 'user'] , function(){
        Route::post('/update-profile'  , [AuthController::class , 'update_profile']);
        Route::get('/get-profile'      , [AuthController::class , 'get_profile']);
        Route::get('/delete-profile'   , [AuthController::class , 'delete_profile']);
        Route::post('/change-password' , [AuthController::class , 'change_Password']);
    });

    Route::get('/levels', [HomeController::class, 'levels']);
    Route::get('/level/{id}', [HomeController::class, 'level']);
    Route::get('/exam/{id}', [HomeController::class, 'exam']);
    Route::get('/exams', [HomeController::class, 'exams']);

    Route::post('/store/score', [HomeController::class, 'store_score']);
    Route::post('/score', [HomeController::class, 'score']);

    Route::get('/report_exams', [HomeController::class, 'report_exams']);
    Route::get('/report_exams/{id}', [HomeController::class, 'report_exams_id']);
    Route::get('/report_score', [HomeController::class, 'report_score']);
    Route::get('/report_score/{id}', [HomeController::class, 'report_score_id']);


});
// ====================== routes not auth ===========================================

Route::post('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/videos', [HomeController::class, 'videos']);

});
