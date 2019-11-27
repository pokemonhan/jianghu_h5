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
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
//        $outputDatas = $this->model::filter($inputDatas, GameFilter::class)->get();
//        return msgOut(true, $outputDatas, '200', '获取成功');
        return msgOut(true, $inputDatas);
    }
}
