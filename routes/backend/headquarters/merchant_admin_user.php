<?php

//运营商管理
Route::group(['prefix' => 'merchant-admin-user', 'namespace' => 'Merchant'], static function () {
    $namePrefix = 'headquarters-api.merchant-admin-user.';
    $controller = 'MerchansAdminUserController@';
    //运营商列表
    Route::match(['get', 'options'], 'detail', ['as' => $namePrefix . 'detail', 'uses' => $controller . 'detail']);
    //添加运营商
    Route::match(['post', 'options'], 'do-add', ['as' => $namePrefix . 'do-add', 'uses' => $controller . 'doAdd']);
});
