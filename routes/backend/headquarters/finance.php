<?php

//金融分类管理
Route::group(['prefix' => 'finance-type'], static function () {
    $namePrefix = 'headquarters-api.finance-type.';
    $controller = 'BackendFinanceTypeController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-do', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-do', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-do', 'uses' => $controller.'delDo']);
});

//金融厂商管理
Route::group(['prefix' => 'finance-vendor'], static function () {
    $namePrefix = 'headquarters-api.finance-vendor.';
    $controller = 'BackendFinanceVendorController@';
    Route::match(['post','options'], 'add-do', ['as' => $namePrefix.'add-do', 'uses' => $controller.'addDo']);
    Route::match(['post','options'], 'edit-do', ['as' => $namePrefix.'edit-do', 'uses' => $controller.'editDo']);
    Route::match(['get','options'], 'index-do', ['as' => $namePrefix.'index-do', 'uses' => $controller.'indexDo']);
    Route::match(['post','options'], 'del-do', ['as' => $namePrefix.'del-do', 'uses' => $controller.'delDo']);
});
