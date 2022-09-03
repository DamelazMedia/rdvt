<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RadioShowController;
use App\Http\Controllers\Admin\RadioTimeTableController;

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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});

Route::prefix('dashboard')->group(function(){
    Route::get('/', function(){
        return view('welcome')->name('dashboard');
    });
    Route::prefix('user')->group(function(){
        Route::get('/', function(){
            return view('welcome')->name('user.dashboard');
        });
    });

   // ->middleware('auth')
    Route::prefix('admin')->group(function(){

        Route::get('/', function(){
            return view('welcome');
        })->name('admin.dashboard');

        Route::prefix('users')->group(function(){
            Route::controller(UserController::class)->group(function(){
                Route::get('/', 'index')->name('users.index');
                Route::get('/create', 'create')->name('users.create');
                Route::post('/', 'store')->name('users.store');
                Route::get('/edit/{User:id}', 'edit')->name('users.edit');
                Route::put('/update/{User:id}', 'update')->name('users.update');
                Route::delete('/delete/{User:id}', 'destroy')->name('users.destroy');
                Route::get('/view/{User:id}', 'show')->name('users.show');
            });
        });
        Route::prefix('shows')->group(function(){
            Route::controller(RadioShowController::class)->group(function(){
                Route::get('/', 'index')->name('shows.index');
                Route::get('/create', 'create')->name('shows.create');
                Route::post('/', 'store')->name('shows.store');
                Route::get('/edit/{RadioShow:id}', 'edit')->name('shows.edit');
                Route::put('/update/{RadioShow:id}', 'update')->name('shows.update');
                Route::delete('/delete/{RadioShow:id}', 'destroy')->name('shows.delete');
                Route::get('/view/{RadioShow:slug}', 'show')->name('shows.show');
            });
        });
        Route::prefix('schedules')->group(function(){
            Route::controller(RadioTimeTableController::class)->group(function(){
                Route::get('/', 'index')->name('schedules.index');
                Route::get('/create', 'create')->name('schedules.create');
                Route::post('/', 'store')->name('schedules.store');
                Route::get('/edit/{RadioTimeTable:id}', 'edit')->name('schedules.edit');
                Route::put('/update/{RadioTimeTable:id}', 'update')->name('schedules.update');
                Route::delete('/delete/{RadioTimeTable:id}', 'destroy')->name('schedules.delete');
                //Route::get('/view/{RadioShow:slug}', 'show')->name('schedules.show');
            });
        });
    });


});
