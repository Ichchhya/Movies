<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\FavoriteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function() {
    // Route::resource('/');
    Route::get('/','index')->name('index');
    
});

Route::controller(MovieController::class)->prefix('admin/movies')->name('admin.movies.')->group(function() {
    // Route::resource('/');
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
});

Route::controller(FavoriteController::class)->prefix('admin/favorites')->name('admin.favorites.')->group(function() {
    // Route::resource('/');
    Route::get('/','index')->name('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
