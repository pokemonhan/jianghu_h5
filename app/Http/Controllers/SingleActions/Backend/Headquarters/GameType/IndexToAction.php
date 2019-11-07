<?php

namespace App\Http\Controllers\SingleActions\Backend\Headquarters\GameType;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexToAction
 * @package App\Http\Controllers\SingleActions\Backend\Headquarters\GameType
 */
class IndexToAction extends BaseAction
{
    /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute() :JsonResponse
    {
        $outputDatas = $this->model->get()->toArray();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
