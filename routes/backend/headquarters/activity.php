<?php

use App\Http\Controllers\BackendApi\Headquarters\BackendSystemDynActivityController;

//金融分类管理
Route::group(
    ['prefix' => 'activity'],
    static function () {
        $namePrefix = 'headquarters-api.activity.';
        Route::match(['get','options'], 'index-do', [BackendSystemDynActivityController::class, 'index'])->name($namePrefix.'index-do');
        Route::match(['post','options'], 'status-do', [BackendSystemDynActivityController::class, 'status'])->name($namePrefix.'status-do');
    },
);
