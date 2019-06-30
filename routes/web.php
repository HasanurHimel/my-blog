<?php



Route::get('/', 'Frontend\HomeController@index')->name('/');
Route::get('/detail', 'Frontend\HomeController@detail')->name('detail');





Auth::routes();

Route::group(['middleware'=> 'auth', 'namespace'=>'Backend'] ,function(){
    Route::resource('profile', 'ProfileController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController');
    Route::get('category/published/{id}', 'CategoryController@publishedCategory')->name('category.published');
    Route::get('category/unpublished/{id}', 'CategoryController@unpublishedCategory')->name('category.unpublished');
    Route::get('category/trash/{id}', 'CategoryController@deleteCategory')->name('category.trash');

    Route::resource('subCategory', 'SubCategoryController');

    Route::get('Subcategory/published/{id}', 'SubCategoryController@publishedSubCategory')->name('subCategory.published');
    Route::get('Subcategory/unpublished/{id}', 'SubCategoryController@unpublishedSubCategory')->name('subCategory.unpublished');
    Route::get('category/delete/{id}', 'SubCategoryController@deleteSubCategory')->name('subCategory.delete');

    Route::resource('carousel', 'CarouselController');

    Route::get('carousel/published', 'CarouselController@publishedCarousel')->name('carousel.published');
    Route::get('carousel/unpublished', 'CarouselController@unpublishedUnpublished')->name('carousel.unpublished');
    Route::get('carousel/trash/{id}', 'CarouselController@deleteCarousel')->name('carousel.trash');

});



