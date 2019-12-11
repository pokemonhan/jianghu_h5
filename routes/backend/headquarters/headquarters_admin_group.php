<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:25 PM
 */

use App\Http\Controllers\BackendApi\Headquarters\Admin\BackendAdminGroupController;

//管理员角色相关
Route::group(
    ['prefix' => 'backend-admin-group'],
    static function () {
        $namePrefix = 'headquarters-api.backend-admin-group.';
        //添加管理员角色
        Route::match(['post', 'options'], 'create', [BackendAdminGroupController::class, 'create'])->name($namePrefix . 'create');
        //获取管理员角色
        Route::match(['get', 'options'], 'detail', [BackendAdminGroupController::class, 'index'])->name($namePrefix . 'detail');
        //编辑管理员角色
        Route::match(['post', 'options'], 'edit', [BackendAdminGroupController::class, 'edit'])->name($namePrefix . 'edit');
        //删除管理员角色
        Route::match(
            ['post', 'options'],
            'delete-access-group',
            [
            BackendAdminGroupController::class,  'destroy'],
        )->name($namePrefix . 'delete-access-group');
        //获取管理员角色
        Route::match(
            ['post', 'options'],
            'specific-group-users',
            [BackendAdminGroupController::class, 'specificGroupUsers'],
        )->name($namePrefix . 'specific-group-users');
    },
);
