<?php

namespace App\Http\Controllers\BackendApi\Headquarters\Merchant;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Http\Requests\Backend\Headquarters\Merchant\MerchansAdminUser\DoAddRequest;
use App\Http\SingleActions\Backend\Headquarters\Merchant\MerchansAdminUser\DetailAction;
use App\Http\SingleActions\Backend\Headquarters\Merchant\MerchansAdminUser\DoAddAction;
use Illuminate\Http\JsonResponse;

/**
 * 运营商
 */
class MerchansAdminUserController extends BackEndApiMainController
{
    public function detail(DetailAction $action)
    {
        return $action->execute();
    }

    /**
     * 添加运营商
     * @param DoAddRequest $request Request.
     * @param DoAddAction  $action  Action.
     * @return JsonResponse
     */
    public function doAdd(DoAddRequest $request, DoAddAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }
}
