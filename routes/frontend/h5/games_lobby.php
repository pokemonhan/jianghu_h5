<?php

use App\Http\Controllers\FrontendApi\H5\GamesLobbyController;

// 游戏大厅
Route::group(
    ['prefix' => 'games-lobby'],
    static function (): void {
        Route::match(
            ['get', 'options'],
            'rich-list',
            [GamesLobbyController::class, 'richList'],
        )->name('app-api.games-lobby.rich-list');
        Route::match(
            ['get', 'options'],
            'game-categories',
            [GamesLobbyController::class, 'category'],
        )->name('app-api.games-lobby.rich-list');
    },
);
