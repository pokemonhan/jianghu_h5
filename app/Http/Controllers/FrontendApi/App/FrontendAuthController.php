<?php

namespace App\Http\Controllers\FrontendApi\App;

use App\Http\Controllers\FrontendApi\FrontendApiMainController;
use App\Http\SingleActions\Common\Frontend\FrontendAuthLoginAction;
use App\Http\SingleActions\Common\Frontend\FrontendAuthLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FrontendAuthController
 * @package App\Http\Controllers\FrontendApi
 */
class FrontendAuthController extends FrontendApiMainController
{
    /**
     * @var string $eloqM
     */
    public $eloqM = 'User\FrontendUser';

    /**
     * Login user and create token
     * @param FrontendAuthLoginAction $action  验证登录.
     * @param Request                 $request 请求.
     * @return JsonResponse [string]  access_token
     */
    public function login(FrontendAuthLoginAction $action, Request $request): JsonResponse
    {
        return $action->execute($this, $request);
    }

    /**
     * @param Request                  $request 请求.
     * @param FrontendAuthLogoutAction $action  用户退出.
     * @return JsonResponse
     */
    public function logout(Request $request, FrontendAuthLogoutAction $action): JsonResponse
    {
        return $action->execute($this, $request);
    }
}
