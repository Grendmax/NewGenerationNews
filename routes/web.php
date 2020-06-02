<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', 'newses');
Route::resource('newses', 'NewsController');
Route::post('/getNews/{id}','NewsController@getNews')->name('newses.getNews');
