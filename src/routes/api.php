<?php

use App\Http\Route;

Route::get('/',               'CryptographyController@index');
Route::get('/users/fetch',          'CryptographyController@fetch');
Route::post('/user/encrypt',              'CryptographyController@encrypt');
Route::get('/user/{id}',           'CryptographyController@findById');
Route::put('/user/update/{id}',         'CryptographyController@update');
Route::delete('/user/{id}/delete', 'CryptographyController@remove');
