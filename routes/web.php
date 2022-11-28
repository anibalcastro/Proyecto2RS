<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;

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

//User
Route::get('/settings', [HomeController::class, 'settings'])->middleware('auth');

//Posts
Route::get('/', [PostController::class, 'index']);
Route::get('/create-post',[PostController::class, 'createPost'])->middleware('auth');
Route::get('/edit-post/{id}', [PostController::class, 'updateView'])->middleware('auth');
Route::post('/edit-post/{id}', [PostController::class, 'update'])->middleware('auth');
Route::get('/delete-post/{id}',[PostController::class, 'delete'])->middleware('auth');
Route::get('/post-information/{id}', [PostController::class, 'postInformation'])->middleware('auth');


//User Actions
Route::post('/update/user', [UserController::class, 'update'])->middleware('auth');
Route::post('/delete/user', [UserController::class, 'destroy'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'store'])->middleware('auth');


Auth::routes();
Route::get('/home', [PostController::class, 'index'])->name('home');

//2AF
Route::post('/login.2fa/{user}',[LoginController::class, 'login2FA']);