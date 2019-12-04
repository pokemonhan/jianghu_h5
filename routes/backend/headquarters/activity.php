<?php

//金融分类管理
Route::group(
    ['prefix' => 'activity'],
    static function () {
        $namePrefix = 'headquarters-api.activity.';
        $controller = 'BackendSystemDynActivityController@';
        Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'index']);
        Route::match(['post','options'], 'status-do', ['as' => $namePrefix.'status-do', 'uses' => $controller.'status']);
    },
);
