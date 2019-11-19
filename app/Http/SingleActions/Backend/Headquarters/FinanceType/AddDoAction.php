<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AddDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class AddDoAction extends BaseAction
{
    /**
     * @param Request $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request) :JsonResponse
    {
        $inputDatas = $request->all();
        $this->model->name = $inputDatas['name'];
        $this->model->sign = $inputDatas['sign'];
        $this->model->is_online = $inputDatas['is_online'];
        $this->model->direction = $inputDatas['direction'];
        if ($this->model->save()) {
            return msgOut(true, [], '200', '添加成功');
        }
        throw new \Exception('300500');
    }
}
