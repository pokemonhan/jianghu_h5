<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditToAction
 * @package App\Http\Controllers\SingleActions\Backend\Headquarters\GameType
 */
class EditToAction extends BaseAction
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
        if ($model->save()) {
            return msgOut(true, [], '200', '修改成功');
        }
        return msgOut(false, [], '403', '修改失败');
    }
}
