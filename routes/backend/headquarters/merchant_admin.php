<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:22 PM
 */

use App\Http\Controllers\BackendApi\Merchant\Admin\MerchantAdminUserController;

//管理员相关
Route::group(
    ['prefix' => 'merchant-admin-user', 'namespace' => 'Admin'],
    static function () {
        $namePrefix = 'merchant-api.merchant-admin-user.';
        Route::match(
            ['post', 'options'],
            'create',
            [MerchantAdminUserController::class, 'create'],
        );
        Route::match(
            ['get', 'options'],
            'get-all-admins',
            [MerchantAdminUserController::class, 'allAdmins'],
        );
        Route::match(
            ['post', 'options'],
            'update-admin-group',
            [MerchantAdminUserController::class, 'updateAdminGroup'],
        );
        Route::match(
            ['post', 'options'],
            'delete-admin',
            [MerchantAdminUserController::class, 'deletePartnerAdmin'],
        );
        Route::match(
            ['post', 'options'],
            'search-admin',
            [MerchantAdminUserController::class, 'searchAdmin'],
        );
    },
);
