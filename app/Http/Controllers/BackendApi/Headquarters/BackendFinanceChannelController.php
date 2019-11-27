<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Requests\Backend\Headquarters\FinanceChannel\AddDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceChannel\EditDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceChannel\DelDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceChannel\IndexDoRequest;
use App\Http\SingleActions\Backend\Headquarters\FinanceChannel\AddDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceChannel\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceChannel\IndexDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceChannel\DelDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceChannel\GetSearchConditionAction;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendFinanceChannelController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendFinanceChannelController extends BackEndApiMainController
{
    /**
     * @param AddDoAction  $action  Action.
     * @param AddDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddDoRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * @param EditDoAction  $action  Action.
     * @param EditDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editDo(EditDoAction $action, EditDoRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($this, $inputDatas);
    }

    /**
     * @param IndexDoAction  $action  Action.
     * @param IndexDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function indexDo(IndexDoAction $action, IndexDoRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param DelDoAction  $action  Action.
     * @param DelDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delDo(DelDoAction $action, DelDoRequest $request) :JsonResponse
    {
        $inputDatas = $request->validated();
        return $action->execute($inputDatas);
    }

    /**
     * @param GetSearchConditionAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function getSearchCondition(GetSearchConditionAction $action):JsonResponse
    {
        return $action->execute();
    }
}
