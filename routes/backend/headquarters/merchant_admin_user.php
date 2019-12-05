<?php

//运营商管理
Route::group(
    ['prefix' => 'platform', 'namespace' => 'Merchant'],
    static function () {
        $namePrefix = 'headquarters-api.platform.';
        $controller = 'PlatformController@';
        //运营商列表
        Route::match(['get', 'options'], 'detail', ['as' => $namePrefix . 'detail', 'uses' => $controller . 'detail']);
        //添加运营商
        Route::match(['post', 'options'], 'do-add', ['as' => $namePrefix . 'do-add', 'uses' => $controller . 'doAdd']);
        //运营商状态开关
        Route::match(['post', 'options'], 'switch', ['as' => $namePrefix . 'switch', 'uses' => $controller . 'switch']);
        //分配游戏
        Route::match(['post', 'options'], 'assign-games', ['as' => $namePrefix . 'assign-games', 'uses' => $controller . 'assignGames']);
        //已分配的游戏
        Route::match(['get', 'options'], 'assigned-games', ['as' => $namePrefix . 'assigned-games', 'uses' => $controller . 'assignedGames']);
        //未分配的游戏
        Route::match(['get', 'options'], 'unassign-games', ['as' => $namePrefix . 'unassign-games', 'uses' => $controller . 'unassignGames']);
        //获取分配游戏接口的查询条件
        Route::match(
            ['get', 'options'],
            'get-search-data-of-assign-game',
            ['as' => $namePrefix . 'get-search-data-of-assign-game', 'uses' => $controller . 'getSearchDataOfAssignGame'],
        );
    },
);
