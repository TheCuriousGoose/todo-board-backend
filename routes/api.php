<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeslotController;
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

Route::apiResource('tasks', TaskController::class);
Route::get('timeslots', [TimeslotController::class, 'index']);
