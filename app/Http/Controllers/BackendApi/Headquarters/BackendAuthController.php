<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\SingleActions\Common\Backend\BackendAuthLoginAction;
use App\Http\SingleActions\Common\Backend\BackendAuthLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 后台管理员
 */
class BackendAuthController extends BackEndApiMainController
{

    /**
     * Login user and create token
     *
     * @param Request                $request Request.
     * @param BackendAuthLoginAction $action  Action.
     * @return JsonResponse
     */
    public function login(Request $request, BackendAuthLoginAction $action): JsonResponse
    {
        return $action->execute($this, $request);
    }

    /**
     * Logout user (Revoke the token)
     * @param Request                 $request Request.
     * @param BackendAuthLogoutAction $action  Action.
     * @return JsonResponse
     */
    public function logout(Request $request, BackendAuthLogoutAction $action): JsonResponse
    {
        return $action->execute($this, $request);
    }
}
