<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

use Illuminate\Http\JsonResponse;

/**
 * Class StatusDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class StatusDoAction extends BaseAction
{
   /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
        if ($this->model->where('id', $inputDatas['id'])->update(['status' => $inputDatas['status']])) {
            return msgOut(true);
        } else {
            throw new \Exception('300504');
        }
    }
}
