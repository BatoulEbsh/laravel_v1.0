<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

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
Route::group([
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => 'authUser:api',], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });


});
Route::group(['middleware' => 'authUser:api'], function () {
    Route::post('add', [ProductController::class, 'store']);
    Route::post('show', [ProductController::class, 'show']);
    Route::get('showAll', [ProductController::class, 'index']);
    Route::delete('delete/{id}', [ProductController::class, 'destroy']);
    Route::post('update/{id}', [ProductController::class, 'update']);
});
