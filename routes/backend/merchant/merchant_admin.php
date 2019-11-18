<?php

//商户用户相关
Route::match(['get', 'options'], 'logout', ['as' => 'merchant-api.logout', 'uses' => 'MerchantAuthController@logout']);
