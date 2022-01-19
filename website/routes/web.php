<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRecipeController;
use App\Http\Controllers\AdminUserController;
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
Route::get('/create', [RecipeController::class, 'create'])->middleware('likes');
Route::post('/create', [RecipeController::class, 'store'])->middleware('likes');
Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
Route::post('/recipe/{recipe:slug}/create', [LikeController::class, 'store']);
Route::post('/recipe/{recipe:slug}/destroy/{like:id}', [LikeController::class, 'destroy']);

Route::get('/favourites', [LikeController::class, 'index'])->middleware('auth');
Route::get('/user-details', [UserController::class, 'show'])->middleware('auth');
Route::get('/user-details/edit', [UserController::class, 'edit'])->middleware('auth');
Route::patch('/user-details/update/{user}', [UserController::class, 'update'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/recipes/', [AdminRecipeController::class, 'index'])->middleware('admin');
Route::get('/admin/recipes/create', [AdminRecipeController::class, 'create'])->middleware('admin');
Route::post('/admin/recipes/create', [AdminRecipeController::class, 'store'])->middleware('admin');
Route::get('/admin/recipes/edit/{recipe:slug}', [AdminRecipeController::class, 'edit'])->middleware('admin');
Route::patch('/admin/recipes/update/{recipe:slug}', [AdminRecipeController::class, 'update'])->middleware('admin');
Route::delete('/admin/recipes/delete/{recipe:slug}', [AdminRecipeController::class, 'destroy'])->middleware('admin');

Route::get('/admin/users', [AdminUserController::class, 'index'])->middleware('admin');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->middleware('admin');
Route::post('/admin/users/create', [AdminUserController::class, 'store'])->middleware('admin');
Route::get('/admin/users/edit/{user:username}', [AdminUserController::class, 'edit'])->middleware('admin');
Route::patch('/admin/users/update/{user:username}', [AdminUserController::class, 'update'])->middleware('admin');
Route::delete('/admin/users/delete/{user:username}', [AdminUserController::class, 'destroy'])->middleware('admin');
