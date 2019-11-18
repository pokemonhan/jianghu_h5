<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:22 PM
 */

//登录
Route::match(['post', 'options'], 'login', ['as' => 'headquarters-api.login', 'uses' => 'BackendAuthController@login']);
//退出登录
Route::match(['get', 'options'], 'logout', ['as' => 'headquarters-api.logout', 'uses' => 'BackendAuthController@logout']);
