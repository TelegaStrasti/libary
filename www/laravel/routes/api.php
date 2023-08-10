<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\TakeBookController;
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

Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('take-book/{book_id}', [TakeBookController::class, 'takeBook']);
    Route::post('return-book/{book_id}', [TakeBookController::class, 'returnBook']);
});

Route::apiResource('author', AuthorController::class);
Route::apiResource('book', BookController::class);
Route::apiResource('genre', GenreController::class);


//Route::apiResource('taken-books', 'TakenBookController');
