<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\Controllers\SingleActions\Backend\Headquarters\GameType
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
