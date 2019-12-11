<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\ModelFilters\Finance\SystemFinanceTypeFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class IndexDoAction extends BaseAction
{

    /**
     * @var object $model
     */
    protected $model;
    /**
     * @param  BackEndApiMainController $contll     Contll.
     * @param  array                    $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas) :JsonResponse
    {
        $outputDatas = $this->model::filter($inputDatas, SystemFinanceTypeFilter::class)->paginate($contll->inputs['pageSize']);
        return msgOut(true, $outputDatas);
    }
}
