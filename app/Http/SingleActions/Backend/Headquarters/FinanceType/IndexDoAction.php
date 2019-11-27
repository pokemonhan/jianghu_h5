<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class IndexDoAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
//        $outputDatas = $this->model::filter($inputDatas, SystemFinanceTypeFilter::class)->get();
//        return msgOut(true, $outputDatas, '200', '获取成功');
        return msgOut(true, $inputDatas);
    }
}
