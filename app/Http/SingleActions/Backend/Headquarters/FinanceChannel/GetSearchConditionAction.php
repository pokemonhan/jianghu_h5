<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceChannel;

use App\Models\Finance\SystemFinanceType;
use App\Models\Finance\SystemFinanceVendor;
use Illuminate\Http\JsonResponse;

/**
 * Class GetSearchConditionAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceChannel
 */
class GetSearchConditionAction extends BaseAction
{
   /**
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute() :JsonResponse
    {
        $channels = $this->model->select(['id', 'type_id', 'vendor_id', 'name'])->get();
        $types = (new SystemFinanceType())->select(['id', 'name'])->get();
        $vendors = (new SystemFinanceVendor())->select(['id', 'name'])->get();
        return msgOut(
            true,
            [
               'channels' => $channels,
               'vendors' => $vendors,
               'types' => $types,
            ],
            '200',
            '获取成功',
        );
    }
}
