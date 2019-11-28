<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceVendor;

use App\ModelFilters\Finance\SystemFinanceVendorFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceVendor
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
        $outputDatas = $this->model::filter($inputDatas, SystemFinanceVendorFilter::class)->get();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
