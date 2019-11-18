<?php

//管理员角色相关
Route::group(['prefix' => 'merchant-admin-group', 'namespace' => 'Admin'], static function () {
    $namePrefix = 'merchant-api.merchant-admin-group.';
    $controller = 'MerchantAdminGroupController@';
    //添加管理员角色
    Route::match(['post', 'options'], 'create', ['as' => $namePrefix . 'create', 'uses' => $controller . 'create']);
    //获取管理员角色
    Route::match(['get', 'options'], 'detail', ['as' => $namePrefix . 'detail', 'uses' => $controller . 'index']);
    //编辑管理员角色
    Route::match(['post', 'options'], 'edit', ['as' => $namePrefix . 'edit', 'uses' => $controller . 'edit']);
    //删除管理员角色
    Route::match(['post', 'options'], 'delete', ['as' => $namePrefix . 'delete', 'uses' => $controller . 'destroy']);
    //获取管理员角色
    Route::match(
        ['post', 'options'],
        'specific-group-users',
        ['as' => $namePrefix . 'specific-group-users', 'uses' => $controller . 'specificGroupUsers'],
    );
});
