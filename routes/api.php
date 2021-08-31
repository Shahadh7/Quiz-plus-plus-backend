<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SayingController;
use App\Http\Controllers\SubjectController;
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

Route::middleware(['cors'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/subjects', [SubjectController::class, 'view']);
    Route::get('/levels', [LevelController::class, 'view']);
    Route::get('/exams/{id?}',[ExamController::class, 'view']);
    Route::get('/sayings',[SayingController::class, 'view']);
});






Route::middleware(['auth:sanctum','cors'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/subjects/create', [SubjectController::class, 'create']);
    Route::put('/subjects/{id}', [SubjectController::class, 'update']);
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);

    Route::post('/exams/create',[ExamController::class, 'create']);
    Route::delete('/exams/{id}', [ExamController::class, 'destroy']);

    Route::put('/quizs/{id}', [QuizController::class, 'update']);

    
});
