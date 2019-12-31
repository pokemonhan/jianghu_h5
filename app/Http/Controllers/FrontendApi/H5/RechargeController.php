<?php

namespace App\Http\Controllers\FrontendApi\H5;

use App\Http\Controllers\FrontendApi\FrontendApiMainController;
use App\Http\Requests\Frontend\H5\Recharge\TypesRequest;
use App\Http\SingleActions\Frontend\H5\Recharge\TypesAction;
use Illuminate\Http\JsonResponse;

/**
 * Class RechargeController
 * @package App\Http\Controllers\FrontendApi\H5
 */
class RechargeController extends FrontendApiMainController
{
    /**
     * @param TypesAction  $action  Action.
     * @param TypesRequest $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function types(TypesAction $action, TypesRequest $request): JsonResponse
    {
        $inputDatas = $request->validated();
        $outputs    = $action->execute($inputDatas);
        return $outputs;
    }
}
