<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceChannel;

use App\ModelFilters\Finance\SystemFinanceChannelFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceChannel
 */
class IndexDoAction extends BaseAction
{
    /**
     * @var object $model
     */
    protected $model;
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
        $outputDatas = $this->model::filter($inputDatas, SystemFinanceChannelFilter::class)->get()->toArray();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
