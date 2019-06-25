<?php



Route::get('/', 'Frontend\HomeController@index')->name('/');
Route::get('/detail', 'Frontend\HomeController@detail')->name('detail');

