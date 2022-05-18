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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("tasks")->group(function(){
    Route::get("/", App\Http\Controllers\Task\IndexController::class)->name("task.index");
    Route::get("/{taskId}", App\Http\Controllers\Task\ShowController::class)->name("task.show");
    Route::post("/", App\Http\Controllers\Task\StoreController::class)->name("task.store");
    Route::put("/{taskId}", App\Http\Controllers\Task\UpdateController::class)->name("task.update");
    Route::delete("/{taskId}", App\Http\Controllers\Task\DeleteController::class)->name("task.delete");
});
