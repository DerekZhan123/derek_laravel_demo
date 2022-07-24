<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Index page
Route::get('/', [PostController::class, 'index']);

//Add the middleware for controll login
/*
 * Post airticle realted
 * Add middleware for controll login
 *
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('posts/delete/{id}', [PostController::class, 'delete']);
    Route::get('posts/edit/{id}', [PostController::class, 'edit']);
    Route::get('posts/detail/{id}', [PostController::class, 'detail']);
    Route::post('posts/update', [PostController::class, 'update']);
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts/add', [PostController::class, 'store']);
});

/*
 * User Register,login and logout
 */
Route::get('user', [UserController::class, 'create']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/login', [UserController::class, 'login']);
Route::post('user/login', [UserController::class, 'logindo'])->name('login');
Route::get('user/logout', [UserController::class, 'logout']);
