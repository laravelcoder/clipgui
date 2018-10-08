<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('clips', 'ClipsController', ['except' => ['create', 'edit']]);

        Route::resource('clip_filters', 'ClipFiltersController', ['except' => ['create', 'edit']]);

        Route::resource('brands', 'BrandsController', ['except' => ['create', 'edit']]);

        Route::resource('products', 'ProductsController', ['except' => ['create', 'edit']]);

        Route::resource('industries', 'IndustriesController', ['except' => ['create', 'edit']]);

        Route::resource('ftps', 'FtpsController', ['except' => ['create', 'edit']]);

        Route::resource('images', 'ImagesController', ['except' => ['create', 'edit']]);

        Route::resource('states', 'StatesController', ['except' => ['create', 'edit']]);

        Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);

});
