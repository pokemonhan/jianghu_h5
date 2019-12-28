<?php

namespace App\Http\Controllers\BackendApi\Merchant\Finance;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\Requests\Backend\Merchant\Finance\Online\AddDoRequest;
use App\Http\SingleActions\Backend\Merchant\Finance\Online\AddDoAction;
use App\Http\SingleActions\Backend\Merchant\Finance\Online\GetChannelsAction;
use Illuminate\Http\JsonResponse;

/**
 * Class OnlineFinanceController
 * @package App\Http\Controllers\BackendApi\Merchant\Finance
 */
class OnlineFinanceController extends BackEndApiMainController
{

    /**
     * 获取线上支付渠道
     * @param GetChannelsAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function getChannels(GetChannelsAction $action): JsonResponse
    {
        $outputDatas = $action->execute();
        return $outputDatas;
    }

    /**
     * 添加线上支付方式
     * @param AddDoAction  $action  Action.
     * @param AddDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddDoRequest $request): JsonResponse
    {
        $inputDatas  = $request->validated();
        $outputDatas = $action->execute($this, $inputDatas);
        return $outputDatas;
    }
}
