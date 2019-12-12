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
        $pageSize = $this->model::getPageSize();
        $outputDatas = $this->model::with(
            ['lastEditor', 'author'],
        )->filter($inputDatas, SystemFinanceChannelFilter::class)->paginate($pageSize);
        return msgOut(true, $outputDatas);
    }
}
