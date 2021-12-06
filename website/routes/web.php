<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Recipe;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RecipeController;
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
Route::get('/', [HomepageController::class, 'index']);
Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'index']);

Route::get('/favourites', [LikeController::class, 'show'])->middleware('auth');
Route::get('/user-details', [UserController::class, 'show'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
