<?php

Route::group(['prefix' => 'cars', 'namespace' => 'api'], function () {
    Route::get('setting', 'CarController@getSettings');
    Route::post('save', 'CarController@save');
});
