<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:44 PM
 */

Route::match(['post', 'options'], 'login', ['as' => 'web-api.login', 'uses' => 'FrontendAuthController@login']);

//管理总代用户与玩家
Route::group(['prefix' => 'user'], static function () {
    $namePrefix = 'web-api.FrontendAuthController.';
    $controller = 'FrontendAuthController@';
    Route::match(['get', 'options'], 'logout', ['as' => $namePrefix . 'logout', 'uses' => $controller . 'logout']);
});
