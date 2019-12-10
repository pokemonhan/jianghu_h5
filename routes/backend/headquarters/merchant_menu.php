<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:24 PM
 */
use App\Http\Controllers\BackendApi\Headquarters\DeveloperUsage\Merchant\MenuController;

//代理后台菜单相关
Route::group(
    ['prefix' => 'merchant-menu'],
    static function () {
        $namePrefix = 'headquarters-api.merchant-menu.';
        //获取运营后台的所有菜单
        Route::match(
            ['get', 'options'],
            'get-all-menu',
            [MenuController::class, 'getAllMenu'],
        )->name($namePrefix . 'get-all-menu');
        Route::match(
            ['post', 'options'],
            'change-parent',
            [MenuController::class, 'changeParent'],
        )->name($namePrefix . 'change-parent');
        Route::match(
            ['post', 'options'],
            'add',
            [MenuController::class, 'doAdd'],
        )->name($namePrefix . 'add');
        Route::match(
            ['post', 'options'],
            'edit',
            [MenuController::class, 'edit'],
        )->name($namePrefix . 'edit');
        Route::match(
            ['post', 'options'],
            'delete',
            [MenuController::class, 'delete'],
        )->name($namePrefix . 'delete');
    },
);
