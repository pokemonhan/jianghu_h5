<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceVendor;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceVendor
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
        $model->whitelist_ips = $inputDatas['whitelist_ips'];
        if ($model->save()) {
            return msgOut(true, [], '200', '修改成功');
        }
        throw new \Exception('300601');
    }
}
