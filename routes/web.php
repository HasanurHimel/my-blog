<?php



Route::get('/', 'Frontend\HomeController@index')->name('/');
Route::get('/detail', 'Frontend\HomeController@detail')->name('detail');





Auth::routes();

Route::group(['middleware'=> 'auth', 'namespace'=>'Backend'] ,function(){






    Route::resource('profile', 'ProfileController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

});



