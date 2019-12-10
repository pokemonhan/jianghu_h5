<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 4/11/2019
 * Time: 12:44 PM
 */
use App\Http\Controllers\FrontendApi\App\FrontendAuthController;

Route::match(['post', 'options'], 'login', [FrontendAuthController::class, 'login'])->name('web-api.login');

//管理总代用户与玩家
Route::group(['prefix' => 'user'], static function () {
    Route::match(['get', 'options'], 'logout', [FrontendAuthController::class, 'logout'])->name('user.logout');
    Route::match(['put', 'options'], 'refresh-token', [FrontendAuthController::class, 'refreshToken'])->name('user.refresh-token');
});
