<?php

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

Route::prefix('user')->group(function (){
    Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
    Route::post('register', [\App\Http\Controllers\UserController::class, 'login']);
    Route::post('password_forgot', [\App\Http\Controllers\UserController::class, 'login']);
    Route::get('getProfile', [\App\Http\Controllers\UserController::class, 'getProfile']);
});

Route::prefix('role')->group(function () {
    Route::get('', [\App\Http\Controllers\UserController::class, 'getRoles']);
    Route::post('store', [\App\Http\Controllers\UserController::class, 'createRole']);
    Route::put('update', [\App\Http\Controllers\UserController::class, 'updateRole']);
    Route::delete('delete', [\App\Http\Controllers\UserController::class, 'deleteRole']);
});

Route::prefix('todo')->group(function (){
    Route::get('/', [\App\Http\Controllers\TodoController::class, 'index']);
    Route::get('summary', [\App\Http\Controllers\TodoController::class, 'summary']);
    Route::post('store', [\App\Http\Controllers\TodoController::class, 'index']);
    Route::put('update/{uuid}', [\App\Http\Controllers\TodoController::class, 'index']);
    Route::put('changeStatus/{uuid}', [\App\Http\Controllers\TodoController::class, 'index']);

});
