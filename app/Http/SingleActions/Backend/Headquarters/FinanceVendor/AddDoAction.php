<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceVendor;

use Illuminate\Http\JsonResponse;

/**
 * Class AddDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceVendor
 */
class AddDoAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas):JsonResponse
    {
        if (isset($inputDatas['whitelist_ips'])) {
            $inputDatas['whitelist_ips'] = json_encode($inputDatas['whitelist_ips']);
        }
        $this->model->fill($inputDatas);
        if ($this->model->save()) {
            return msgOut(true, [], '200', '添加成功');
        }
        throw new \Exception('300600');
    }
}
