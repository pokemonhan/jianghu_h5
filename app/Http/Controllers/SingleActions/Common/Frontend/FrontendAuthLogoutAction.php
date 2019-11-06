<?php

namespace App\Http\SingleActions\Common\Frontend;

use App\Http\Controllers\FrontendApi\FrontendApiMainController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class for frontend auth logout action.
 */
class FrontendAuthLogoutAction
{
    use AuthenticatesUsers;
    /**
     * Login user and create token
     * @param FrontendApiMainController $contll  Controller.
     * @param Request                   $request Request.
     * @return JsonResponse
     */
    public function execute(FrontendApiMainController $contll, Request $request): JsonResponse
    {
        $throtleKey = Str::lower($this->username() . '|' . $request->ip());
        if ($request->hasSession()) {
            $request->session()->invalidate();
        }
        $this->limiter()->clear($throtleKey);
        $contll->currentAuth->logout();
        $contll->currentAuth->invalidate();
        return msgOut(true); //'Successfully logged out'
    }
}
