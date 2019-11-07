<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class DelToAction
 * @package App\Http\Controllers\SingleActions\Backend\Headquarters\GameType
 */
class DelToAction extends BaseAction
{
    /**
     * @param Request $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request) :JsonResponse
    {
        $inputDatas = $request->all();
        if ($this->model->where('id', $inputDatas['id'])->delete()) {
            return msgOut(true, [], '200', '删除成功');
        }
        return msgOut(false, [], '400', '删除失败');
    }
}
