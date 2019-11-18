<?php

namespace App\Http\Controllers\BackendApi\Merchant\Admin;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroupCreateRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroupDestroyRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroupEditRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroupSpecificGroupUsersRequest;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroupCreateAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroupDestroyAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroupEditAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroupIndexAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroupSpecificGroupUsersAction;
use Illuminate\Http\JsonResponse;

/**
 * 管理员角色组
 */
class PartnerAdminGroupController extends MerchantApiMainController
{
    /**
     * Display a listing of the resource.
     *
     * @param PartnerAdminGroupIndexAction $action Action.
     * @return JsonResponse
     */
    public function index(PartnerAdminGroupIndexAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param PartnerAdminGroupCreateRequest $request Request.
     * @param PartnerAdminGroupCreateAction  $action  Action.
     * @return JsonResponse
     */
    public function create(PartnerAdminGroupCreateRequest $request, PartnerAdminGroupCreateAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PartnerAdminGroupEditRequest $request Request.
     * @param PartnerAdminGroupEditAction  $action  Action.
     * @return JsonResponse
     */
    public function edit(PartnerAdminGroupEditRequest $request, PartnerAdminGroupEditAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * 删除组管理员角色
     * @param PartnerAdminGroupDestroyRequest $request Request.
     * @param PartnerAdminGroupDestroyAction  $action  Action.
     * @return JsonResponse
     */
    public function destroy(
        PartnerAdminGroupDestroyRequest $request,
        PartnerAdminGroupDestroyAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * 获取管理员角色
     * @param PartnerAdminGroupSpecificGroupUsersRequest $request Request.
     * @param PartnerAdminGroupSpecificGroupUsersAction  $action  Action.
     * @return JsonResponse
     */
    public function specificGroupUsers(
        PartnerAdminGroupSpecificGroupUsersRequest $request,
        PartnerAdminGroupSpecificGroupUsersAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
