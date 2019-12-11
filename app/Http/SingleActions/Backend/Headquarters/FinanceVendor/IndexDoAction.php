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
        $outputDatas = $this->model::with(
            ['lastEditor', 'author'],
        )->filter($inputDatas, SystemFinanceVendorFilter::class)->paginate($this->model::getPageSize());
        return msgOut(true, $outputDatas);
    }
}
