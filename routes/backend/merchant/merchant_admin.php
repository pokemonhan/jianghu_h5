<?php

use App\Http\Controllers\BackendApi\Merchant\Admin\MerchantAdminUserController;
use App\Http\Controllers\BackendApi\Merchant\MerchantAuthController;

//登录
Route::match(['post', 'options'], 'login', [MerchantAuthController::class, 'login'])->name('merchant-api.login');
//退出登录
Route::match(['get', 'options'], 'logout', [MerchantAuthController::class, 'logout'])->name('merchant-api.logout');
//管理员相关
Route::group(
    ['prefix' => 'merchant-admin-user'],
    static function () {
        $namePrefix = 'merchant-api.merchant-admin-user.';
        Route::match(['post', 'options'], 'create', [MerchantAdminUserController::class, 'create'])->name($namePrefix . 'create');
        Route::match(['get', 'options'], 'get-all-admins', [MerchantAdminUserController::class, 'allAdmins'])->name($namePrefix . 'get-all-admins');
        Route::match(
            ['post', 'options'],
            'update-admin-group',
            [MerchantAdminUserController::class, 'updateAdminGroup'],
        )->name($namePrefix . 'update-admin-group');
        Route::match(
            ['post', 'options'],
            'delete-admin',
            [MerchantAdminUserController::class, 'deletePartnerAdmin'],
        )->name($namePrefix . 'delete-admin');
        Route::match(['post', 'options'], 'search-admin', [MerchantAdminUserController::class, 'searchAdmin'])->name($namePrefix . 'search-admin');
    },
);
