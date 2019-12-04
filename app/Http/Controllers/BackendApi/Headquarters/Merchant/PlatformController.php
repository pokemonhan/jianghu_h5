<?php

namespace App\Http\Controllers\BackendApi\Headquarters\Merchant;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Http\Requests\Backend\Headquarters\Merchant\Platform\DoAddRequest;
use App\Http\Requests\Backend\Headquarters\Merchant\Platform\SwitchRequest;
use App\Http\SingleActions\Backend\Headquarters\Merchant\Platform\DetailAction;
use App\Http\SingleActions\Backend\Headquarters\Merchant\Platform\DoAddAction;
use App\Http\SingleActions\Backend\Headquarters\Merchant\Platform\SwitchAction;
use Illuminate\Http\JsonResponse;

/**
 * 运营商
 */
class PlatformController extends BackEndApiMainController
{
    /**
     *
     * @param DetailAction $action Action.
     * @return JsonResponse
     */
    public function detail(DetailAction $action): JsonResponse
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

    /**
     * @param SwitchRequest $request Request.
     * @param SwitchAction  $action  Action.
     * @return JsonResponse
     */
    public function switch(SwitchRequest $request, SwitchAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
