<?php

use App\Http\Controllers\Api\AirticleController;
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

//Add one api for get all article data
Route::namespace('Api')
    ->prefix('v1')
    ->name('api.v1.')
    ->group(function () {
        // 通过{uri}/index 访问到 AirticleController中的show方法
        Route::get('/show', [AirticleController::class, 'show'])->name('airticle.show');
    });
