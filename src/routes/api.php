<?php

use App\Http\Route;

Route::get('/',               'CryptographyController@index');
Route::get('/fetch',          'CryptographyController@fetch');
Route::post('/encrypt',              'CryptographyController@encrypt');
Route::get('/value/{id}',           'CryptographyController@findById');
Route::put('/update',         'CryptographyController@update');
Route::delete('/{id}/delete', 'CryptographyController@remove');
