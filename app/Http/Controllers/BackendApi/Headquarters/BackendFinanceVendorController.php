<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Headquarters\FinanceVendor\DelDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceVendor\EditDoRequest;
use App\Http\Requests\Backend\Headquarters\FinanceVendor\AddDoRequest;
use App\Http\SingleActions\Backend\Headquarters\FinanceVendor\DelDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceVendor\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceVendor\IndexDoAction;
use App\Http\SingleActions\Backend\Headquarters\FinanceVendor\AddDoAction;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendFinanceVendorController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendFinanceVendorController extends Controller
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
