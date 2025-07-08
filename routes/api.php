<?php

use App\Http\Controllers\post\PostController;
use App\Http\Controllers\register\RegisterController;
use App\Http\Controllers\task\TaskController;
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

Route::apiResource('posts', PostController::class)->only(['index', 'store', 'show']);
Route::apiResource('register', RegisterController::class)->only(['index', 'store', 'show']);
Route::apiResource('tasks', TaskController::class)->only([ 'index', 'store', 'update']);