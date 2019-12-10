<?php

use App\Http\Controllers\FrontendApi\App\GamesLobby\FrontendRichListController;

// 游戏大厅
Route::group(
    ['prefix' => 'games-lobby'],
    static function () {
        Route::match(['get', 'options'], 'rich-list', [FrontendRichListController::class, 'richList'])->name('games-lobby.rich-list');
    },
);
