<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameVendor;

use Illuminate\Http\JsonResponse;

/**
 * Class AddDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameVendor
 */
class AddDoAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
        $this->model->fill($inputDatas, static function () use ($inputDatas) {
            if (!is_null($inputDatas['whitelist_ips'])) {
                $inputDatas['whitelist_ips'] = json_encode($inputDatas['whitelist_ips']);
            }
            return $inputDatas;
        });
        if ($this->model->save()) {
            return msgOut(true, [], '200', '添加成功');
        }
        throw new \Exception('300302');
    }
}
