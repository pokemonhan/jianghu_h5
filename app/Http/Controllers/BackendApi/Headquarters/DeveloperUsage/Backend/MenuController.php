<?php

namespace App\Http\Controllers\BackendApi\Headquarters\DeveloperUsage\Backend;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\DoAddRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\AllRequireInfosRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\DeleteRequest;
use App\Http\Requests\Backend\Headquarters\DeveloperUsage\Backend\Menu\EditRequest;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\DoAddAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\AllRequireInfosAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\ChangeParentAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\DeleteAction;
use App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu\EditAction;
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
    public function currentAdminMenu()
    {
        return msgOut(true, $this->menuLists);
    }

    /**
     * @param AllRequireInfosRequest $request Request.
     * @param AllRequireInfosAction  $action  Action.
     * @return JsonResponse
     */
    public function allRequireInfos(
        AllRequireInfosRequest $request,
        AllRequireInfosAction $action
    ): JsonResponse {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param DoAddRequest $request Request.
     * @param DoAddAction  $action  Action.
     * @return JsonResponse
     */
    public function doAdd(DoAddRequest $request, DoAddAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param DeleteRequest $request Request.
     * @param DeleteAction  $action  Action.
     * @return JsonResponse
     */
    public function delete(DeleteRequest $request, DeleteAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     *  菜单编辑接口
     * (?!\.) - don't allow . at start
     * (?!.*?\.\.) - don't allow 2 consecutive dots
     * (?!.*\.$) - don't allow . at end
     * @param EditRequest $request Request.
     * @param EditAction  $action  Action.
     * @return JsonResponse
     */
    public function edit(EditRequest $request, EditAction $action): JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param ChangeParentAction $action Action.
     * @return JsonResponse
     */
    public function changeParent(ChangeParentAction $action): JsonResponse
    {
        return $action->execute($this->inputs);
    }
}
