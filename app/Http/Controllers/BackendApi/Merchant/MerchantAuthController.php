<?php

namespace App\Http\Controllers\BackendApi\Merchant;

use App\Http\SingleActions\Common\Backend\MerchantAuthLoginAction;
use App\Http\SingleActions\Common\Backend\MerchantAuthLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 运营商管理员
 */
class MerchantAuthController extends MerchantApiMainController
{

    /**
     * Login user and create token
     *
     * @param Request                 $request Request.
     * @param MerchantAuthLoginAction $action  Action.
     * @return JsonResponse
     */
    public function login(Request $request, MerchantAuthLoginAction $action): JsonResponse
    {
        return $action->execute($this, $request);
    }

    /**
     * Logout user (Revoke the token)
     * @param Request                  $request Request.
     * @param MerchantAuthLogoutAction $action  Action.
     * @return JsonResponse
     */
    public function logout(Request $request, MerchantAuthLogoutAction $action): JsonResponse
    {
        return $action->execute($this, $request);
    }
}
