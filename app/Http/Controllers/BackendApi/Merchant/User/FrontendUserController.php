<?php

namespace App\Http\Controllers\BackendApi\Merchant\User;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Http\Requests\Backend\Merchant\User\FrontendUser\IndexRequest;
use App\Http\Requests\Backend\Merchant\User\FrontendUser\loginLogRequest;
use App\Http\SingleActions\Backend\Merchant\User\FrontendUser\IndexAction;
use App\Http\SingleActions\Backend\Merchant\User\FrontendUser\loginLogAction;
use Illuminate\Http\JsonResponse;

/**
 * 用户相关
 */
class FrontendUserController extends MerchantApiMainController
{

    /**
     * 会员列表
     * @param  IndexRequest $request Request.
     * @param  IndexAction  $action  Action.
     * @return JsonResponse
     */
    public function index(IndexRequest $request, IndexAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        $msgOut     = $action->execute($inputDatas);
        return $msgOut;
    }

    /**
     * 会员登录记录
     * @param  loginLogRequest $request Request.
     * @param  loginLogAction  $action  Action.
     * @return JsonResponse
     */
    public function loginLog(loginLogRequest $request, loginLogAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        $msgOut     = $action->execute($inputDatas, $this->currentPlatformEloq->sign);
        return $msgOut;
    }
}
