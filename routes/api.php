<?php

use App\Http\Controllers\FunctionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("register", [FunctionController::class, "register"]);
Route::get("users/{mot?}", [FunctionController::class, "user"]);
Route::post("file/upload", [FunctionController::class, "upload"]);
Route::get("file/", [FunctionController::class, "file"]);
