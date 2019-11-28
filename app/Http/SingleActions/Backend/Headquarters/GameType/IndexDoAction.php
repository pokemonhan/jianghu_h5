<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use App\ModelFilters\Game\GamesTypeFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameType
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
        $outputDatas = $this->model::filter($inputDatas, GamesTypeFilter::class)->get();
        return msgOut(true, $outputDatas, '200', '获取成功');
    }
}
