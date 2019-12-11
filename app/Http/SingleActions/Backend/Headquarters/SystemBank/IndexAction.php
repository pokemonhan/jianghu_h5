<?php

namespace App\Http\SingleActions\Backend\Headquarters\SystemBank;

use App\ModelFilters\Finance\SystemBankFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexAction
 * @package App\Http\SingleActions\Backend\Headquarters\SystemBank
 */
class IndexAction extends BaseAction
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
        $outputDatas = $this->model::filter($inputDatas, SystemBankFilter::class)->paginate($this->model::getPageSize());
        return msgOut(true, $outputDatas);
    }
}
