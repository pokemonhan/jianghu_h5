<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class DelDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class DelDoAction extends BaseAction
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
        throw new \Exception('300202');
    }
}
