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
    'namespace' => 'Category',
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoryController@index');
    Route::post('/', 'CategoryController@store');

    Route::put('/{id}', 'CategoryController@update');
    Route::delete('/{id}', 'CategoryController@destroy');
});