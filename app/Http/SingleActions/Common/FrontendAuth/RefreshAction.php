<?php
namespace App\Http\SingleActions\Common\FrontendAuth;

use App\Http\Controllers\FrontendApi\FrontendApiMainController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

/**
 * Class RefreshAction
 * @package App\Http\SingleActions\Common\FrontendAuth
 */
class RefreshAction
{

    /**
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        $frontend = new FrontendApiMainController();
        $token = $frontend->currentAuth->refresh();
        $expireInMinute = $frontend->currentAuth->factory()->getTTL();
        $expireAt = Carbon::now()->addMinutes($expireInMinute)->format('Y-m-d H:i:s');
        $data = [
           'access_token' => $token,
           'token_type' => 'Bearer',
           'expires_at' => $expireAt,
        ];
        return msgOut(true, $data);
    }
}
