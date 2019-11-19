<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class IndexDoAction extends BaseAction
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function execute()
    {
        $outputDatas = $this->model->get();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
