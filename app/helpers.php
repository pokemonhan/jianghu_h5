<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 8/14/2019
 * Time: 5:25 PM
 */

use Illuminate\Http\JsonResponse;

if (!function_exists('configure')) {
    /**
     * @param string|null $sysKey  SysKey.
     * @param string|null $default Default.
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    function configure(?string $sysKey = null, ?string $default = null)
    {
        if (!isset($sysKey)) {
            return app('Configure');
        } else {
            return app('Configure')->get($sysKey, $default);
        }
    }
}


/**
 * @param boolean $success     Success.
 * @param mixed   $data        Data.
 * @param string  $code        Code.
 * @param string  $message     Message.
 * @param string  $placeholder Placeholder.
 * @param string  $substituted Substituted.
 * @return JsonResponse
 * @throws Exception 异常.
 */
function msgOut(
    bool $success = false,
    $data = [],
    string $code = '',
    string $message = '',
    string $placeholder = '',
    string $substituted = ''
): JsonResponse {
    $defaultSuccessCode = '200';
    $defaultErrorCode = '404';
    if ($success === true) {
        $code = $code === '' ? $defaultSuccessCode : $code;
    } else {
        $code = $code === '' ? $defaultErrorCode : $code;
        throw new Exception($code);
    }
    if ($placeholder === '' || $substituted === '') {
        $message = $message === '' ? __('codes-map.' . $code) : $message;
    } else {
        $message = $message === '' ? __('codes-map.' . $code, [$placeholder => $substituted]) : $message;
    }
    $datas = [
        'status' => true,
        'code' => $code,
        'data' => $data,
        'message' => $message,
    ];
    return response()->json($datas);
}
