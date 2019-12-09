<?php

//设置管理
Route::group(
    ['prefix' => 'setting'],
    static function () {
        $namePrefix = 'headquarters-api.setting.';
        $controller = 'SettingController@';
        Route::match(['post','options'], 'login-log-detail', ['as' => $namePrefix.'login-log-detail', 'uses' => $controller.'loginLogDetail']);
    },
);
