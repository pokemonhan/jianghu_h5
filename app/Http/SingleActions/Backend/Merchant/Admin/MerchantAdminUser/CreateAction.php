<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Models\Admin\MerchantAdminAccessGroup;
use App\Models\Admin\MerchantAdminUser;
use App\ModelFilters\Admin\MerchantAdminAccessGroupFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class for create action.
 */
class CreateAction
{
    /**
     * Create api
     *
     * @param  MerchantApiMainController $contll     Controller.
     * @param  array                     $inputDatas 接收的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(MerchantApiMainController $contll, array $inputDatas): JsonResponse
    {
        //管理员角色组ID是否合法
        $filterArr = [
            'platform' => $contll->currentPlatformEloq->sign,
            'super' => MerchantAdminAccessGroup::NO_SUPER,
        ];
        $platformAdminGroupId = MerchantAdminAccessGroup::filter($filterArr, MerchantAdminAccessGroupFilter::class)->pluck('id')->toArray();
        if (!in_array($inputDatas['group_id'], $platformAdminGroupId)) {
            throw new \Exception('300700');
        }
        //生成用户数据
        $inputDatas['password'] = bcrypt($inputDatas['password']);
        $inputDatas['platform_sign'] = $contll->currentPlatformEloq->sign;
        $user = MerchantAdminUser::create($inputDatas);

        $success['name'] = $user->name;
        return msgOut(true, $success);
    }
}
