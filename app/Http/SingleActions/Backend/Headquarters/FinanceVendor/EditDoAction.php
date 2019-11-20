<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceVendor;

use Illuminate\Http\JsonResponse;

/**
 * Class EditDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceVendor
 */
class EditDoAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
        $model = $this->model->find($inputDatas['id']);
        if (!is_null($inputDatas['whitelist_ips'])) {
            $inputDatas['whitelist_ips'] = json_encode($inputDatas['whitelist_ips']);
        }
        $model->fill($inputDatas);
        if ($model->save()) {
            return msgOut(true, [], '200', '修改成功');
        }
        throw new \Exception('300601');
    }
}
