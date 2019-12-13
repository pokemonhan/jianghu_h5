<?php

use App\Http\Controllers\BackendApi\Merchant\Game\GameTypeController;

//游戏种类
Route::group(
    ['prefix' => 'game-type'],
    static function () {
        $namePrefix = 'merchant-api.game-type.';
        Route::match(['get','options'], 'index', [GameTypeController::class, 'index'])->name($namePrefix.'index');
        Route::match(['post','options'], 'status', [GameTypeController::class, 'status'])->name($namePrefix.'status');
    },
);
