<?php

namespace App\Http\Controllers\BackendApi\Merchant\Admin;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Http\Requests\Backend\Merchant\Admin\MerchantAdminUser\CreateRequest;
use App\Http\Requests\Backend\Merchant\Admin\MerchantAdminUser\UpdateAdminGroupRequest;
use App\Http\Requests\Backend\Merchant\Admin\MerchantAdminUser\DeleteAdminRequest;
use App\Http\Requests\Backend\Merchant\Admin\MerchantAdminUser\SearchAdminRequest;
use App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser\CreateAction;
use App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser\UpdateAdminGroupAction;
use App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser\DeleteAdminAction;
use App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser\AllAdminsAction;
use App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminUser\SearchAdminAction;
use Illuminate\Http\JsonResponse;

/**
 * Controls the data flow into a merchant admin user object and updates the view whenever data changes.
 */
class MerchantAdminUserController extends MerchantApiMainController
{
    /**
     * create api
     * @param CreateRequest $request Request.
     * @param CreateAction  $action  Action.
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * 获取所有当前平台的商户管理员用户
     * @param AllAdminsAction $action Action.
     * @return JsonResponse
     */
    public function allAdmins(AllAdminsAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * 修改管理员的归属组
     * @param UpdateAdminGroupRequest $request Request.
     * @param UpdateAdminGroupAction  $action  Action.
     * @return JsonResponse
     */
    public function updateAdminGroup(
        UpdateAdminGroupRequest $request,
        UpdateAdminGroupAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * 删除管理员
     * @param DeleteAdminRequest $request Request.
     * @param DeleteAdminAction  $action  Action.
     * @return JsonResponse
     */
    public function deletePartnerAdmin(
        DeleteAdminRequest $request,
        DeleteAdminAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * @param SearchAdminRequest $request Request.
     * @param SearchAdminAction  $action  Action.
     * @return JsonResponse
     */
    public function searchAdmin(
        SearchAdminRequest $request,
        SearchAdminAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }
}
