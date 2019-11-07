<?php

//游戏种类
Route::group(['prefix' => 'game-type'], static function () {
    $namePrefix = 'headquarters-api.game-type.';
    $controller = 'BackendGameTypeController@';
    Route::match(['post','options'], 'add-to', ['as' => $namePrefix.'add-to', 'uses' => $controller.'addTo']);
    Route::match(['post','options'], 'edit-to', ['as' => $namePrefix.'edit-to', 'uses' => $controller.'editTo']);
    Route::match(['get','options'], 'index-to', ['as' => $namePrefix.'index-to', 'uses' => $controller.'indexTo']);
    Route::match(['post','options'], 'del-to', ['as' => $namePrefix.'del-to', 'uses' => $controller.'delTo']);
});
