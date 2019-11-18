<?php

namespace App\Http\Controllers\BackendApi\Merchant;

use Illuminate\Http\JsonResponse;

/**
 * 菜单
 */
class MenuController extends MerchantApiMainController
{
    /**
     * @return JsonResponse
     */
    public function currentPartnerMenu(): JsonResponse
    {
        return msgOut(true, $this->partnerMenulists);
    }
}
