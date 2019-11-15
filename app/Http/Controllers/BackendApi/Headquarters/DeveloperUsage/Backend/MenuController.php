<?php

namespace App\Http\Controllers\BackendApi\Headquarters\DeveloperUsage\Backend;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuDoAddRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuAllRequireInfosRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuDeleteRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuEditRequest;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuDoAddAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuAllRequireInfosAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuChangeParentAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuDeleteAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\MenuEditAction;
use Illuminate\Http\JsonResponse;

/**
 * 菜单
 */
class MenuController extends BackEndApiMainController
{
    /**
     * Gets all menu.
     * @return JsonResponse
     */
    /*public function getAllMenu()
    {
        return msgOut(true, $this->fullMenuLists);
    }*/

    /**
     * @return JsonResponse
     */
    public function currentPartnerMenu()
    {
        return msgOut(true, $this->partnerMenulists);
    }

    /**
     * @param MenuAllRequireInfosRequest $request Request.
     * @param MenuAllRequireInfosAction  $action  Action.
     * @return JsonResponse
     */
    public function allRequireInfos(
        MenuAllRequireInfosRequest $request,
        MenuAllRequireInfosAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param MenuDoAddRequest $request Request.
     * @param MenuDoAddAction  $action  Action.
     * @return JsonResponse
     */
    public function doAdd(MenuDoAddRequest $request, MenuDoAddAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param MenuDeleteRequest $request Request.
     * @param MenuDeleteAction  $action  Action.
     * @return JsonResponse
     */
    public function delete(MenuDeleteRequest $request, MenuDeleteAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     *  菜单编辑接口
     * (?!\.) - don't allow . at start
     * (?!.*?\.\.) - don't allow 2 consecutive dots
     * (?!.*\.$) - don't allow . at end
     * @param MenuEditRequest $request Request.
     * @param MenuEditAction  $action  Action.
     * @return JsonResponse
     */
    public function edit(MenuEditRequest $request, MenuEditAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param MenuChangeParentAction $action Action.
     * @return JsonResponse
     */
    public function changeParent(MenuChangeParentAction $action): JsonResponse
    {
        return $action->execute($this->inputs);
    }
}
