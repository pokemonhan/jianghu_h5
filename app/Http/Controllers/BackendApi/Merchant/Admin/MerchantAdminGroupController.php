<?php

namespace App\Http\Controllers\BackendApi\Merchant\Admin;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroup\CreateRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroup\DestroyRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroup\EditRequest;
use App\Http\Requests\Backend\Merchant\Admin\PartnerAdminGroup\SpecificGroupUsersRequest;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroup\CreateAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroup\DestroyAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroup\EditAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroup\IndexAction;
use App\Http\SingleActions\Backend\Merchant\Admin\PartnerAdminGroup\SpecificGroupUsersAction;
use Illuminate\Http\JsonResponse;

/**
 * 管理员角色组
 */
class MerchantAdminGroupController extends MerchantApiMainController
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexAction $action Action.
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action->execute($this);
    }

    /**
     * Show the form for creating a new resource.
     *
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
     * Show the form for editing the specified resource.
     *
     * @param EditRequest $request Request.
     * @param EditAction  $action  Action.
     * @return JsonResponse
     */
    public function edit(EditRequest $request, EditAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * 删除组管理员角色
     * @param DestroyRequest $request Request.
     * @param DestroyAction  $action  Action.
     * @return JsonResponse
     */
    public function destroy(
        DestroyRequest $request,
        DestroyAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * 获取管理员角色
     * @param SpecificGroupUsersRequest $request Request.
     * @param SpecificGroupUsersAction  $action  Action.
     * @return JsonResponse
     */
    public function specificGroupUsers(
        SpecificGroupUsersRequest $request,
        SpecificGroupUsersAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
