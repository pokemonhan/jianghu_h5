<?php

//运营商管理
Route::group(
    ['prefix' => 'platform', 'namespace' => 'Merchant'],
    static function () {
        $namePrefix = 'headquarters-api.platform.';
        $controller = 'PlatformController@';
        //运营商列表
        Route::match(['get', 'options'], 'detail', ['as' => $namePrefix . 'detail', 'uses' => $controller . 'detail']);
        //添加运营商
        Route::match(['post', 'options'], 'do-add', ['as' => $namePrefix . 'do-add', 'uses' => $controller . 'doAdd']);
        //运营商状态开关
        Route::match(['post', 'options'], 'switch', ['as' => $namePrefix . 'switch', 'uses' => $controller . 'switch']);
    },
);
