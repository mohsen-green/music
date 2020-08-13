<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

// بررسی دسترسی ادمین با میان افزار
Route::group(['middleware' => ['role:superadmin']], function () {

    Route::get('/', function () {return view('index');});

// route geners
    Route::resource('genre', 'GenreController');

// route music
    Route::resource('music', 'MusicController');

// route artist
    Route::resource('artist', 'ArtistController');

// route album
    Route::resource('album', 'AlbumController');

// route channel
    Route::resource('channel', 'ChannelController');

    // route slider
    Route::resource('slider', 'SliderController');
    // route admin
    Route::resource('admin', 'AdministratorController');

});


