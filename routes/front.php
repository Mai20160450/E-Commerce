<?php
Route::group(['prefix' => 'front' , 'namespace' => 'Front'], function () {

        Route::post('subscribe', 'FrontController@storeSubscribe');


    
});