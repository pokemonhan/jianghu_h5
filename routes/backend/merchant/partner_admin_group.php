<?php

//管理员角色相关
Route::group(['prefix' => 'partner-admin-group', 'namespace' => 'Admin'], static function () {
    $namePrefix = 'headquarters-api.partner-admin-group.';
    $controller = 'PartnerAdminGroupController@';
    //添加管理员角色
    Route::match(['post', 'options'], 'create', ['as' => $namePrefix . 'create', 'uses' => $controller . 'create']);
    //获取管理员角色
    Route::match(['get', 'options'], 'detail', ['as' => $namePrefix . 'detail', 'uses' => $controller . 'index']);
    //编辑管理员角色
    Route::match(['post', 'options'], 'edit', ['as' => $namePrefix . 'edit', 'uses' => $controller . 'edit']);
    //删除管理员角色
    Route::match(['post', 'options'], 'delete-access-group', ['as' => $namePrefix . 'delete-access-group', 'uses' => $controller . 'destroy']);
    //获取管理员角色
    Route::match(
        ['post', 'options'],
        'specific-group-users',
        ['as' => $namePrefix . 'specific-group-users', 'uses' => $controller . 'specificGroupUsers'],
    );
});
