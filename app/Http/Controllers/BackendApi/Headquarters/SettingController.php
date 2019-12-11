<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Requests\Backend\Headquarters\Setting\LoginLogDetailRequest;
use App\Http\SingleActions\Backend\Headquarters\Setting\LoginLogDetailAction;
use Illuminate\Http\JsonResponse;

/**
 * 设置管理
 */
class SettingController extends BackEndApiMainController
{
    /**
     * 管理员登录日志
     *
     * @param  LoginLogDetailRequest $request Request.
     * @param  LoginLogDetailAction  $action  Action.
     * @return JsonResponse
     */
    public function loginLogDetail(LoginLogDetailRequest $request, LoginLogDetailAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }
}
