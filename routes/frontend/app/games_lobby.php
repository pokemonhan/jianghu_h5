<?php

// 游戏大厅
Route::group(
    ['prefix' => 'games-lobby', 'namespace' => 'GamesLobby'],
    static function () {
        $namePrefix = 'app-api.games-lobby.';
        $controller = 'FrontendRichListController@';
        Route::match(['get', 'options'], 'rich-list', ['as' => $namePrefix . 'rich-list', 'uses' => $controller . 'richList']);
    },
);
