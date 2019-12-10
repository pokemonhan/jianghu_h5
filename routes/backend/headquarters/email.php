<?php
//总控邮件管理
Route::group(
    ['prefix' => 'email'],
    static function () {
        $namePrefix = 'headquarters-api.email.';
        $controller = 'BackendSystemEmailController@';
        //发邮件
        Route::match(['post','options'], 'send', ['as' => $namePrefix.'send', 'uses' => $controller.'send']);
    },
);
