<?php

use App\Http\Controllers\BackendApi\Headquarters\BackendFinanceTypeController;
use App\Http\Controllers\BackendApi\Headquarters\BackendFinanceVendorController;
use App\Http\Controllers\BackendApi\Headquarters\BackendFinanceChannelController;
use App\Http\Controllers\BackendApi\Headquarters\BackendSystemBankController;

//金融分类管理
Route::group(
    ['prefix' => 'finance-type'],
    static function () {
        $namePrefix = 'headquarters-api.finance-type.';
        Route::match(['post','options'], 'add-do', [BackendFinanceTypeController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendFinanceTypeController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [BackendFinanceTypeController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendFinanceTypeController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendFinanceTypeController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [BackendFinanceTypeController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendFinanceTypeController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);

//金融厂商管理
Route::group(
    ['prefix' => 'finance-vendor'],
    static function () {
        $namePrefix = 'headquarters-api.finance-vendor.';
        Route::match(['post','options'], 'add-do', [BackendFinanceVendorController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendFinanceVendorController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [BackendFinanceVendorController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendFinanceVendorController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendFinanceVendorController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [BackendFinanceVendorController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendFinanceVendorController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);

//金融通道管理
Route::group(
    ['prefix' => 'finance-channel'],
    static function () {
        $namePrefix = 'headquarters-api.finance-channel.';
        Route::match(['post','options'], 'add-do', [BackendFinanceChannelController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendFinanceChannelController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['post','options'], 'opt-edit-do', [BackendFinanceChannelController::class, 'optEditDo'])->name($namePrefix.'opt-edit-do');
        Route::match(['get','options'], 'index-do', [BackendFinanceChannelController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendFinanceChannelController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendFinanceChannelController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(
            ['get','options'],
            'get-search-condition',
            [BackendFinanceChannelController::class, 'getSearchCondition'],
        )->name($namePrefix.'get-search-condition');
        Route::match(['post','options'], 'status-do', [BackendFinanceChannelController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendFinanceChannelController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);

//系统银行卡管理
Route::group(
    ['prefix' => 'bank'],
    static function () {
        $namePrefix = 'headquarters-api.bank.';
        Route::match(['post','options'], 'add-do', [BackendSystemBankController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [BackendSystemBankController::class, 'edit'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [BackendSystemBankController::class, 'index'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [BackendSystemBankController::class, 'index'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [BackendSystemBankController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [BackendSystemBankController::class, 'status'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [BackendSystemBankController::class, 'status'])->name($namePrefix.'opt-status-do');
    },
);
