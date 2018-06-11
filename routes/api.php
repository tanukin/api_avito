<?php

Route::group([
    'namespace' => 'Advertisement',
    'prefix' => 'advertisements',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::post('/', 'AdvertisementController@store')->name('advertisements.store');

    Route::get('/awating-moderation', 'AdvertisementController@awatingModeration')->name('advertisements.awatingModeration');

    Route::get('/{id}', 'AdvertisementController@show')->name('advertisements.show');
    Route::put('/{id}', 'AdvertisementController@update')->name('advertisements.update');
    Route::delete('/{id}', 'AdvertisementController@destroy')->name('advertisements.destroy');
});
