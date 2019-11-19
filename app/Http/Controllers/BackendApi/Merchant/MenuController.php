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
    public function currentAdminMenu(): JsonResponse
    {
        return msgOut(true, $this->menuLists);
    }
}
