<?php

//菜单相关
Route::group(['prefix' => 'menu'], static function () {
    $namePrefix = 'merchant-api.menu.';
    $controller = 'MenuController@';

    //获取当前商户的菜单
    Route::match(
        ['get', 'options'],
        'current-admin-menu',
        ['as' => $namePrefix . 'current-admin-menu', 'uses' => $controller . 'currentAdminMenu'],
    );
});
