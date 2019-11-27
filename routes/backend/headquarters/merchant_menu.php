<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:24 PM
 */

//代理后台菜单相关
Route::group(['prefix' => 'merchant-menu', 'namespace' => 'DeveloperUsage\Merchant'], static function () {
    $namePrefix = 'headquarters-api.merchant-menu.';
    $controller = 'MenuController@';
    //获取运营后台的所有菜单
    Route::match(
        ['get', 'options'],
        'get-all-menu',
        ['as' => $namePrefix . 'get-all-menu', 'uses' => $controller . 'getAllMenu'],
    );
    Route::match(
        ['post', 'options'],
        'change-parent',
        ['as' => $namePrefix . 'change-parent', 'uses' => $controller . 'changeParent'],
    );
    Route::match(
        ['post', 'options'],
        'add',
        ['as' => $namePrefix . 'add', 'uses' => $controller . 'doAdd'],
    );
    Route::match(
        ['post', 'options'],
        'edit',
        ['as' => $namePrefix . 'edit', 'uses' => $controller . 'edit'],
    );
    Route::match(
        ['post', 'options'],
        'delete',
        ['as' => $namePrefix . 'delete', 'uses' => $controller . 'delete'],
    );
});
