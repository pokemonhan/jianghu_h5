<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceChannel;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use Illuminate\Http\JsonResponse;

/**
 * Class AddDoAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceChannel
 */
class AddDoAction extends BaseAction
{
    /**
     * @param  BackEndApiMainController $contll     Contll.
     * @param  array                    $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        $inputDatas['author_id'] = $contll->currentAdmin->id;
        $this->model->fill($inputDatas);
        if (!$this->model->save()) {
            throw new \Exception('300800');
        }
        $msgOut = msgOut(true);
        return $msgOut;
    }
}
