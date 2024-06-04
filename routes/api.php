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





});
// ====================== routes not auth ===========================================

Route::post('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/videos', [HomeController::class, 'videos']);

