<?php

namespace App\Http\Controllers\BackendApi\Headquarters\Admin;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Http\Requests\Backend\Headquarters\Admin\MerchantDoAddRequest;
use App\Http\SingleActions\Backend\Headquarters\Admin\MerchantAdminUserDoAddAction;
use Illuminate\Http\JsonResponse;

/**
 * 运营商
 */
class MerchansAdminUserController extends BackEndApiMainController
{
    /**
     * 添加运营商
     * @param MerchantDoAddRequest         $request Request.
     * @param MerchantAdminUserDoAddAction $action  Action.
     * @return JsonResponse
     */
    public function doAdd(MerchantDoAddRequest $request, MerchantAdminUserDoAddAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
