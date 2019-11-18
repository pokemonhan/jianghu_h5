<?php

//运营商管理
Route::group(['prefix' => 'merchant-admin-user', 'namespace' => 'Admin'], static function () {
    $namePrefix = 'headquarters-api.merchant-admin-user.';
    $controller = 'MerchansAdminUserController@';
    //添加运营商
    Route::match(['post', 'options'], 'do-add', ['as' => $namePrefix . 'do-add', 'uses' => $controller . 'doAdd']);
});
