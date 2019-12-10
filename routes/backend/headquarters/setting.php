<?php

use App\Http\Controllers\BackendApi\Headquarters\SettingController;

//设置管理
Route::group(
    ['prefix' => 'setting'],
    static function () {
        $namePrefix = 'headquarters-api.setting.';
        Route::match(['post','options'], 'login-log-detail', [SettingController::class, 'loginLogDetail'])->name($namePrefix.'login-log-detail');
    },
);
