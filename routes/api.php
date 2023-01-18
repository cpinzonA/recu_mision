<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SportController;
use App\Http\Controllers\AuthController;
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
route::group(
    [
        'prefix' => 'sport',
        'controller'=>SportController::class,
        'middleware'=>'jwtauth:api'
    ],function () {
        Route::group([
            'middleware'=>'role::admin'
        ], function(){
            Route::get('/','index')->name('sport.index');
            Route::get('/{id}','show')->name('sport.show');
            Route::post('/','store')->name('sport.store');
            Route::put('/{id}','update')->name('sport.update');
            Route::delete('/{id}','destroy')->name('sport.destroy');
        });
     
    });
    Route::group([
        'prefix' => 'auth'
    
    ], function ($router) {
    
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::middleware('jwtauth:api')->group(function(){
            Route::post('refresh', [AuthController::class,'refresh']);
            Route::post('me', [AuthController::class,'me']);
        });
    
    });