<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin;

use App\Models\Admin\MerchantAdminAccessGroup;
use Illuminate\Http\JsonResponse;

/**
 * Class for partner admin group specific group users action.
 */
class PartnerAdminGroupSpecificGroupUsersAction
{
    /**
     * @var MerchantAdminAccessGroup
     */
    protected $model;

    /**
     * @param MerchantAdminAccessGroup $merchantAdminAccessGroup MerchantAdminAccessGroup.
     */
    public function __construct(MerchantAdminAccessGroup $merchantAdminAccessGroup)
    {
        $this->model = $merchantAdminAccessGroup;
    }

    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $accessGroupEloq = $this->model::find($inputDatas['id']);
        if ($accessGroupEloq !== null) {
            $data = $accessGroupEloq->adminUsers->toArray();
            return msgOut(true, $data);
        } else {
            return msgOut(false, [], '300100');
        }
    }
}
