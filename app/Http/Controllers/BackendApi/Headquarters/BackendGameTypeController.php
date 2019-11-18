<?php

namespace App\Http\Controllers\BackendApi\Headquarters;

use App\Http\SingleActions\Backend\Headquarters\GameType\AddDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\DelDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\EditDoAction;
use App\Http\SingleActions\Backend\Headquarters\GameType\IndexDoAction;
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
     * @param AddDoAction $action  Action.
     * @param AddValidate $request Request.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function addDo(AddDoAction $action, AddValidate $request) :JsonResponse
    {
        return $action->execute($request);
    }

    /**
     * @param EditDoAction $action  Action.
     * @param EditValidate $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function editDo(EditDoAction $action, EditValidate $request) :JsonResponse
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
     * @param DelValidate $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function delDo(DelDoAction $action, DelValidate $request) :JsonResponse
    {
        return $action->execute($request);
    }
}
