<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\SingleActions\Backend\Headquarters\GameVendor\AddDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameVendor\DelDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameVendor\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameVendor\IndexDoAction;
use App\Http\Requests\Backend\Headquarters\GameVendor\AddRequest;
use App\Http\Requests\Backend\Headquarters\GameVendor\DelRequest;
use App\Http\Requests\Backend\Headquarters\GameVendor\EditRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendGameVendorController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendGameVendorController extends BackEndApiMainController
{
    /**
     * @param AddDoAction $action  Action.
     * @param AddRequest  $request Request.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddRequest $request) :JsonResponse
    {
        return $action->execute($request);
    }

    /**
     * @param EditDoAction $action  Action.
     * @param EditRequest  $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editDo(EditDoAction $action, EditRequest $request) :JsonResponse
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
     * @param DelDoAction $action  Action.
     * @param DelRequest  $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delDo(DelDoAction $action, DelRequest $request) :JsonResponse
    {
        return $action->execute($request);
    }
}
