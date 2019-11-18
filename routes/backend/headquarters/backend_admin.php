<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:22 PM
 */

//商户用户相关
Route::match(['get', 'options'], 'logout', ['as' => 'headquarters-api.logout', 'uses' => 'BackendAuthController@logout']);

//管理员相关
Route::group(['prefix' => 'partner-admin-user'], static function () {
    $namePrefix = 'headquarters-api.partnerAdmin.';
    $controller = 'BackendAuthController@';
    Route::match(['get', 'options'], 'get-all-users', ['as' => $namePrefix . 'get-all-users',
        'uses' => $controller . 'allUser']);
});
