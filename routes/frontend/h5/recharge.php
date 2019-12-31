<?php

use App\Http\Controllers\FrontendApi\H5\RechargeController;

Route::group(
    ['prefix' => 'recharge'],
    static function (): void {
        $namePrefix = 'h5-api.recharge.';
        Route::get('types', [RechargeController::class, 'types'])->name($namePrefix . 'types');
    },
);
