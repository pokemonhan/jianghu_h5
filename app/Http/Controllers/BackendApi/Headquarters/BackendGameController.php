<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Requests\Backend\Headquarters\Game\AddRequest;
use App\Http\Requests\Backend\Headquarters\Game\DelRequest;
use App\Http\Requests\Backend\Headquarters\Game\EditRequest;
use App\Http\SingleActions\Backend\Headquarters\Game\AddDoAction;
use App\Http\SingleActions\Backend\Headquarters\Game\DelDoAction;
use App\Http\SingleActions\Backend\Headquarters\Game\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\Game\IndexDoAction;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendGameController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendGameController extends BackEndApiMainController
{
    /**
     * @param AddDoAction $action  Action.
     * @param AddRequest  $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param EditDoAction $action  Action.
     * @param EditRequest  $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editDo(EditDoAction $action, EditRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param IndexDoAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function indexDo(IndexDoAction $action) :JsonResponse
    {
        return $action->execute();
    }

    /**
     * @param DelDoAction $action  Action.
     * @param DelRequest  $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delDo(DelDoAction $action, DelRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }
}
