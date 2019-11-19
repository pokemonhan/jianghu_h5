<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameVendor;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameVendor
 */
class EditDoAction extends BaseAction
{
    /**
     * @param Request $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request) :JsonResponse
    {
        $inputDatas = $request->all();
        $model = $this->model->find($inputDatas['id']);
        $model->name = $inputDatas['name'];
        $model->sign = $inputDatas['sign'];
        $model->whitelist_ips = json_encode(json_decode($inputDatas['whitelist_ips'], true)) ?? '';
        if ($model->save()) {
            return msgOut(true, [], '200', '修改成功');
        }
        throw new \Exception('300303');
    }
}
