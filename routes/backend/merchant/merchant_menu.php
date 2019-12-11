<?php

use App\Http\Controllers\BackendApi\Merchant\MenuController;

//菜单相关
Route::group(
    ['prefix' => 'menu'],
    static function () {
        $namePrefix = 'merchant-api.menu.';

        //获取当前商户的菜单
        Route::match(
            ['get', 'options'],
            'current-admin-menu',
            [MenuController::class, 'currentAdminMenu'],
        )->name($namePrefix . 'current-admin-menu');
    },
);
