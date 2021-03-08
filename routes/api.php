<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas relacionadas aos tipos de tarefa
Route::get('/types',[TypeController::class, 'index']);
Route::prefix('/type')->group(function (){
    Route::post('/store',[TypeController::class, 'store']);
    Route::put('/{id}',[TypeController::class, 'update']);
    Route::delete('/{id}',[TypeController::class, 'destroy']);
});

//Rotas relacionadas às tarefas
Route::get('/tasks',[TaskController::class, 'index']);
Route::prefix('/task')->group(function (){
    Route::post('/store',[TaskController::class, 'store']);
    Route::put('/{id}',[TaskController::class, 'update']);
    Route::delete('/{id}',[TaskController::class, 'destroy']);
    Route::get('/filtered/{filter}',[TaskController::class, 'getTasksFiltered']);
});