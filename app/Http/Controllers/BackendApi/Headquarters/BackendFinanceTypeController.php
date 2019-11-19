<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Requests\Backend\Headquarters\FinanceType\AddDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceType\EditDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceType\DelDoRequest;
use App\Http\SingleActions\Backend\Headquarters\FinanceType\AddDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceType\IndexDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceType\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceType\DelDoAction;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendFinanceTypeController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendFinanceTypeController extends BackEndApiMainController
{
    /**
     * @param AddDoAction  $action  Action.
     * @param AddDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddDoRequest $request) :JsonResponse
    {
        return $action->execute($request);
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
     * @param EditDoAction  $action  Action.
     * @param EditDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editDo(EditDoAction $action, EditDoRequest $request) :JsonResponse
    {
        return $action->execute($request);
    }
    /**
     * @param DelDoAction  $action  Action.
     * @param DelDoRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delDo(DelDoAction $action, DelDoRequest $request) :JsonResponse
    {
        return $action->execute($request);
    }
}
