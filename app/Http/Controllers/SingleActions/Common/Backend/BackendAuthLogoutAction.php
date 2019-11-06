<?php

namespace App\Http\Controllers\SingleActions\Common\Backend;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class for backend auth logout action.
 */
class BackendAuthLogoutAction
{
    use AuthenticatesUsers;

    /**
     * Logout user (Revoke the token)
     * @param BackEndApiMainController $contll  Controller.
     * @param Request                  $request Request.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, Request $request): JsonResponse
    {
        $throtleKey = Str::lower($contll->partnerAdmin->email . '|' . $request->ip());
        if ($request->hasSession()) {
            $request->session()->invalidate();
        }
        $this->limiter()->clear($throtleKey);
        $contll->currentAuth->logout();
        $contll->currentAuth->invalidate();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
