<?php

//游戏种类
Route::group(['prefix' => 'game-type'], static function () {
    $namePrefix = 'headquarters-api.game-type.';
    $controller = 'BackendGameTypeController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-to', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-to', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-to', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-to', 'uses' => $controller.'delDo']);
});
