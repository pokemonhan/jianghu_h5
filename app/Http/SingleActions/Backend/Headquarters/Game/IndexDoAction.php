<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class IndexDoAction extends BaseAction
{
    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute() :JsonResponse
    {
        $outputDatas = $this->model->get();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
