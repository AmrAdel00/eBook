<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('comments', CommentController::class);
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::view('/', 'admin.index')->name('admin');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});