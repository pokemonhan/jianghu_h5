<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class for all admins action.
 */
class AllAdminsAction
{
    /**
     *
     * 获取所有当前平台的商户管理员用户
     * @param MerchantApiMainController $contll Controller.
     * @return JsonResponse
     */
    public function execute(MerchantApiMainController $contll): JsonResponse
    {
        try {
            $data = $contll->currentPlatformEloq->adminUsers->toArray();
            return msgOut(true, $data);
        } catch (Exception $e) {
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
    }
}
