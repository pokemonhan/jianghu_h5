<?php

//登录
Route::match(['post', 'options'], 'login', ['as' => 'merchant-api.login', 'uses' => 'MerchantAuthController@login']);
//退出登录
Route::match(['get', 'options'], 'logout', ['as' => 'merchant-api.logout', 'uses' => 'MerchantAuthController@logout']);
