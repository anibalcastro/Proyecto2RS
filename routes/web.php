<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

//User views
Route::get('/', [HomeController::class, 'index']);
Route::get('/create-post',[PostController::class, 'createPost'])->middleware('auth');
Route::get('/settings', [HomeController::class, 'settings'])->middleware('auth');

//User Actions
Route::post('/update/user', [UserController::class, 'update'])->middleware('auth');
Route::post('/delete/user', [UserController::class, 'destroy'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'store'])->middleware('auth');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
