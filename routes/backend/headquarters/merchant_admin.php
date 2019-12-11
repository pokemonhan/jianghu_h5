<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:22 PM
 */

//管理员相关
Route::group(
    ['prefix' => 'merchant-admin-user', 'namespace' => 'Admin'],
    static function () {
        $namePrefix = 'merchant-api.merchant-admin-user.';
        $controller = 'MerchantAdminUserController@';
        Route::match(
            ['post', 'options'],
            'create',
            ['as' => $namePrefix . 'create', 'uses' => $controller . 'create'],
        );
        Route::match(
            ['get', 'options'],
            'get-all-admins',
            ['as' => $namePrefix . 'get-all-admins', 'uses' => $controller . 'allAdmins'],
        );
        Route::match(
            ['post', 'options'],
            'update-admin-group',
            ['as' => $namePrefix . 'update-admin-group', 'uses' => $controller . 'updateAdminGroup'],
        );
        Route::match(
            ['post', 'options'],
            'delete-admin',
            ['as' => $namePrefix . 'delete-admin', 'uses' => $controller . 'deletePartnerAdmin'],
        );
        Route::match(
            ['post', 'options'],
            'search-admin',
            ['as' => $namePrefix . 'search-admin', 'uses' => $controller . 'searchAdmin'],
        );
    },
);
