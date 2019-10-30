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
    'middleware' => ['frontend-api'],
    'namespace' => 'FrontendApi',
    'prefix' => 'web-api',
], static function () {
    $sRouteDir = base_path().'/routes/frontend/';
    $aRouteFiles = glob($sRouteDir.'*.php');
    foreach ($aRouteFiles as $sRouteFile) {
        include $sRouteFile;
    }
    unset($aRouteFiles);
});
