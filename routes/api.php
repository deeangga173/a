<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserExperiencesController;
use App\Http\Controllers\Api\UserQualificationsController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [RegisterController::class, "register"]);

// Route::get('dashboard', [DashboardController::class, 'dashboard'])-> middleware('only_admin');

Route::middleware('auth:sanctum')->group(function () {
Route::group(['middleware' => 'has.role:freelancer'], function () {
   
    //user
    Route::get('users', [UserController::class, "index"]);
    Route::get('users/{id}', [UserController::class, "show"]);
    Route::delete('users/{id}', [UserController::class, "destroy"]);
    Route::post('users', [UserController::class, "store"]);
    Route::put('users/{id}', [UserController::class, "update"]);

    // Route::post('/login', [AuthController::class, "login"]);

 });


 Route::group(['middleware' => 'has.role:admin'], function () {
    //user_experiences
    Route::get('user_experiences', [UserExperiencesController::class, "index"]);
    Route::post('user_experiences/{user}', [UserExperiencesController::class, "store"]);
    Route::get('user_experiences/{id}', [UserExperiencesController::class, "show"]);
    Route::delete('/user_experiences/{id}', [UserExperiencesController::class, "destroy"]);
    Route::put('user_experiences/{id}', [UserExperiencesController::class,"update"]);
 });


Route::group(['middleware' => 'employer'], function () {
    //user_qualifications
    Route::get('user_qualifications', [UserQualificationsController::class, "index"]);
    Route::get('user_qualifications/{id}', [UserQualificationsController::class, "show"]);
    Route::delete('/user_qualifications/{id}', [UserQualificationsController::class, "destroy"]);
    Route::post('user_qualifications', [UserQualificationsController::class, "store"]);
    Route::put('user_qualifications/{id}', [UserQualificationsController::class,"update"]);
 });
});
//login
// Route::post('/login', [AuthController::class, "login"]);
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');


//register


// Route::post('/login', 'Auth/AuthController@login')->middleware('homecare');

// // Menggunakan middleware AdminMiddleware untuk rute admin
// Route::group(['middleware' => 'admin'], function () {
//     // Definisikan rute-rute admin di sini
// });

// // Menggunakan middleware FreelancerMiddleware untuk rute freelancer
// Route::group(['middleware' => 'freelancer'], function () {
//     // Definisikan rute-rute freelancer di sini
// });

// // Menggunakan middleware EmployerMiddleware untuk rute employer
// Route::group(['middleware' => 'employer'], function () {
//     // Definisikan rute-rute employer di sini
// });
