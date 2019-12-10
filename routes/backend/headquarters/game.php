<?php

use App\Http\Controllers\BackendApi\Headquarters\BackendGameTypeController;
use App\Http\Controllers\BackendApi\Headquarters\BackendGameVendorController;
use App\Http\Controllers\BackendApi\Headquarters\BackendGameController;

//游戏种类
Route::group(
    ['prefix' => 'game-type'],
    static function () {
        $namePrefix = 'headquarters-api.game-type.';
        Route::match(['post','options'], 'add-do', [BackendGameTypeController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendGameTypeController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [BackendGameTypeController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendGameTypeController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendGameTypeController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [BackendGameTypeController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendGameTypeController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);

//游戏厂商
Route::group(
    ['prefix' => 'game-vendor'],
    static function () {
        $namePrefix = 'headquarters-api.game-vendor.';
        Route::match(['post','options'], 'add-do', [BackendGameVendorController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendGameVendorController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [BackendGameVendorController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendGameVendorController::class, 'indexDo'])->name($namePrefix.'opt-index-do'); //运营使用
        Route::match(['post','options'], 'del-do', [BackendGameVendorController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [BackendGameVendorController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendGameVendorController::class, 'statusDo'])->name($namePrefix.'opt-status-do');//运营使用
    },
);

//游戏管理
Route::group(
    ['prefix' => 'game'],
    static function () {
        $namePrefix = 'headquarters-api.game.';
        Route::match(['post','options'], 'add-do', [BackendGameController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendGameController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['post','options'], 'opt-edit-do', [BackendGameController::class, 'optEditDo'])->name($namePrefix.'opt-edit-do');
        Route::match(['get','options'], 'index-do', [BackendGameController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendGameController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendGameController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(
            ['get','options'],
            'get-search-condition',
            [BackendGameController::class, 'getSearchCondition'],
        )->name($namePrefix.'get-search-condition');
        Route::match(['post','options'], 'status-do', [BackendGameController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendGameController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);
