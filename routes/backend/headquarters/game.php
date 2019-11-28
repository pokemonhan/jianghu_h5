<?php

//游戏种类
Route::group(['prefix' => 'game-type'], static function () {
    $namePrefix = 'headquarters-api.game-type.';
    $controller = 'BackendGameTypeController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-do', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-do', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-do', 'uses' => $controller.'delDo']);
    Route::match(['post','options'], 'status-do', ['as' => $namePrefix.'status-do', 'uses' => $controller.'statusDo']);
});

//游戏厂商
Route::group(['prefix' => 'game-vendor'], static function () {
    $namePrefix = 'headquarters-api.game-vendor.';
    $controller = 'BackendGameVendorController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-do', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-do', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-do', 'uses' => $controller.'delDo']);
    Route::match(['post','options'], 'status-do', ['as' => $namePrefix.'status-do', 'uses' => $controller.'statusDo']);
});

//游戏管理
Route::group(['prefix' => 'game'], static function () {
    $namePrefix = 'headquarters-api.game.';
    $controller = 'BackendGameController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-do', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-do', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-do', 'uses' => $controller.'delDo']);
    Route::match(
        ['get','options'],
        'get-search-condition',
        ['as' => $namePrefix.'get-search-condition', 'uses' => $controller.'getSearchCondition'],
    );
    Route::match(['post','options'], 'status-do', ['as' => $namePrefix.'status-do', 'uses' => $controller.'statusDo']);
});
