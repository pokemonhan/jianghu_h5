<?php
namespace App\Http\SingleActions\Backend\Headquarters\SystemDynActivity;

use App\ModelFilters\Activity\SystemDynActivityFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexAction
 * @package App\Http\SingleActions\Backend\Headquarters\SystemDynActivity
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
        $outputDatas = $this->model::filter($inputDatas, SystemDynActivityFilter::class)->paginate($this->model::getPageSize());
        return msgOut(true, $outputDatas);
    }
}
