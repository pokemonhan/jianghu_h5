<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
    'middleware' => ['backend-api'],
    'namespace' => 'BackendApi\Headquarters',
    'prefix' => 'headquarters-api',
], static function () {
        Route::match(['post', 'options'], 'login', ['as' => 'headquarters-api.login', 'uses' => 'BackendAuthController@login']);
});

Route::group([
    'middleware' => ['backend-api'],
    'namespace' => 'BackendApi\Headquarters',
    'prefix' => 'headquarters-api',
], static function () {
    $sRouteDir = base_path().'/routes/backend/headquarters/';
    $aRouteFiles = glob($sRouteDir.'*.php');
    foreach ($aRouteFiles as $sRouteFile) {
        include $sRouteFile;
    }
    unset($aRouteFiles);
});

Route::group([
    'middleware' => ['merchant-api'],
    'namespace' => 'BackendApi\Merchant',
    'prefix' => 'merchant-api',
], static function () {
        Route::match(['post', 'options'], 'login', ['as' => 'merchant-api.login', 'uses' => 'MerchantAuthController@login']);
});

Route::group([
    'middleware' => ['merchant-api'],
    'namespace' => 'BackendApi\Merchant',
    'prefix' => 'merchant-api',
], static function () {
    $sRouteDir = base_path().'/routes/backend/merchant/';
    $aRouteFiles = glob($sRouteDir.'*.php');
    foreach ($aRouteFiles as $sRouteFile) {
        include $sRouteFile;
    }
    unset($aRouteFiles);
});

Route::group([
    'middleware' => ['frontend-api'],
    'namespace' => 'FrontendApi\App',
    'prefix' => 'app-api',
], static function () {
    $sRouteDir = base_path().'/routes/frontend/app/';
    $aRouteFiles = glob($sRouteDir.'*.php');
    foreach ($aRouteFiles as $sRouteFile) {
        include $sRouteFile;
    }
    unset($aRouteFiles);
});
