<?php
/**
 * Created by PhpStorm.
 * author: Harris
 * Date: 8/14/2019
 * Time: 5:25 PM
 */

use Illuminate\Http\JsonResponse;

if (!function_exists('configure')) {
    function configure($sysKey = null, $default = null)
    {
        if (is_null($sysKey)) {
            return app('Configure');
        } else {
            return app('Configure')->get($sysKey, $default);
        }
    }
}

/**
 * @param bool $success
 * @param mixed $data
 * @param string $code
 * @param mixed $message
 * @param string $placeholder
 * @param mixed $substituted
 * @return JsonResponse
 * @throws Exception
 */
function msgOut(
    $success = false,
    $data = [],
    $code = '',
    $message = '',
    $placeholder = '',
    $substituted = ''
): JsonResponse
{
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
