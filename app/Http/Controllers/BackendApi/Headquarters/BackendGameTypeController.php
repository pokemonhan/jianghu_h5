<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Http\SingleActions\Backend\Headquarters\GameType\AddToAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\DelToAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\EditToAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\IndexToAction;
use App\Http\Requests\Backend\Headquarters\GameType\AddValidate;
use App\Http\Requests\Backend\Headquarters\GameType\DelValidate;
use App\Http\Requests\Backend\Headquarters\GameType\EditValidate;
use Illuminate\Http\JsonResponse;

/**
 * Class BackendGameTypeController
 * @package App\Http\Controllers\BackendApi\Headquarters
 */
class BackendGameTypeController extends BackEndApiMainController
{
    /**
     * @param AddToAction $action  Action.
     * @param AddValidate $request Request.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function addTo(AddToAction $action, AddValidate $request) :JsonResponse
    {
        return $action->execute($request);
    }

    /**
     * @param EditToAction $action  Action.
     * @param EditValidate $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editTo(EditToAction $action, EditValidate $request) :JsonResponse
    {
        return $action->execute($request);
    }

    /**
     * @param IndexToAction $action Action.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function indexTo(IndexToAction $action) :JsonResponse
    {
        return $action->execute();
    }

    /**
     * @param DelToAction $action  Action.
     * @param DelValidate $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delTo(DelToAction $action, DelValidate $request) :JsonResponse
    {
        return $action->execute($request);
    }
}
