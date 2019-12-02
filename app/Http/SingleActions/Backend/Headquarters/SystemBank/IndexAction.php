<?php

namespace App\Http\SingleActions\Backend\Headquarters\SystemBank;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
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
     * @param BackEndApiMainController $contll     Contll.
     * @param array                    $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas) :JsonResponse
    {
        $outputDatas = $this->model::filter($inputDatas, SystemBankFilter::class)->paginate($contll->pageSize);
        return msgOut(true, $outputDatas);
    }
}
