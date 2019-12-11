<?php

use App\Http\Controllers\BackendApi\Merchant\Game\GameTypeController;

//游戏种类
Route::group(
    ['prefix' => 'game-type'],
    static function () {
        $namePrefix = 'headquarters-api.game-type.';
        Route::match(['post','options'], 'add-do', [GameTypeController::class, 'addDo'])->name($namePrefix.'add-do');
        Route::match(['post','options'], 'edit-do', [GameTypeController::class, 'editDo'])->name($namePrefix.'edit-do');
        Route::match(['get','options'], 'index-do', [GameTypeController::class, 'indexDo'])->name($namePrefix.'index-do');
        Route::match(['get','options'], 'opt-index-do', [GameTypeController::class, 'indexDo'])->name($namePrefix.'opt-index-do');
        Route::match(['post','options'], 'del-do', [GameTypeController::class, 'delDo'])->name($namePrefix.'del-do');
        Route::match(['post','options'], 'status-do', [GameTypeController::class, 'statusDo'])->name($namePrefix.'status-do');
        Route::match(['post','options'], 'opt-status-do', [GameTypeController::class, 'statusDo'])->name($namePrefix.'opt-status-do');
    },
);
