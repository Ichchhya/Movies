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

// Route::get('/', function () {
//     return view('user.index');
// });

Route::group(['middleware' => ['auth']], function() {
Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function() {
    // Route::resource('/');
    Route::get('/','index')->name('index');
    
});

Route::controller(MovieController::class)->prefix('admin/movies')->name('admin.movies.')->group(function() {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
});

Route::controller(FavoriteController::class)->prefix('admin/favorites')->name('admin.favorites.')->group(function() {
    Route::get('/','index')->name('index');
});
});

Route::get('admin/{any}', function () {
    return redirect()->route('movie');
})->where('any', '.*');

Auth::routes();

Route::get('/', [App\Http\Controllers\User\MovieController::class, 'index'])->name('movie');
Route::get('/favorite', [App\Http\Controllers\User\MovieController::class, 'favorite'])->name('favorite');
Route::get('/my-favorites', [App\Http\Controllers\User\MovieController::class, 'allFavorites'])->name('allFavorites');
