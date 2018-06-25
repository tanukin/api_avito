<?php

Route::group([
    'namespace' => 'Advertisement',
    'prefix' => 'advertisements',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::post('/', 'AdvertisementController@store')->name('advertisements.store');

    Route::get('/{id}', 'AdvertisementController@show')->name('advertisements.show');
    Route::put('/{id}', 'AdvertisementController@update')->name('advertisements.update');
    Route::delete('/{id}', 'AdvertisementController@destroy')->name('advertisements.destroy');

    Route::put('/{id}/publish', 'AdvertisementController@publish')->name('advertisements.publish');
    Route::put('/{id}/cancel', 'AdvertisementController@cancel')->name('advertisements.cancel');
});

Route::group([
    'namespace' => 'City',
    'prefix' => 'cities',
], function () {
    Route::get('/', 'CityController@index')->name('cities.index');
    Route::post('/', 'CityController@store')->name('cities.store');

    Route::put('/{id}', 'CityController@update')->name('cities.update');
    Route::delete('/{id}', 'CityController@destroy')->name('cities.destroy');
});
Route::group([
    'namespace' => 'Category',
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoryController@index');
    Route::post('/', 'CategoryController@store');

    Route::put('/{id}', 'CategoryController@update');
    Route::delete('/{id}', 'CategoryController@destroy');
});