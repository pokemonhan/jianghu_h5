<?php

namespace App\Http\SingleActions\Frontend\H5\Recharge;

use App\Http\Controllers\FrontendApi\FrontendApiMainController;
use App\Models\Finance\SystemFinanceOfflineInfo;
use App\Models\Finance\SystemFinanceOnlineInfo;
use App\Models\Finance\SystemFinanceType;
use App\Models\Finance\SystemFinanceUserTag;
use Illuminate\Http\JsonResponse;

/**
 * Class ChannelsAction
 * @package App\Http\SingleActions\Frontend\H5\Recharge
 */
class ChannelsAction
{
    /**
     * @param FrontendApiMainController $contll     Contll.
     * @param array                     $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(FrontendApiMainController $contll, array $inputDatas): JsonResponse
    {
        $inputDatas['tag_id']        = $contll->frontendUser->user_tag_id;
        $inputDatas['platform_sign'] = $contll->frontendUser->platform_sign;
        $inputDatas['platform_id']   = $contll->frontendUser->platform_id;
        $type                        = SystemFinanceType::find($inputDatas['type_id']);
        $data                        = [];
        if ($type->is_online === SystemFinanceType::IS_ONLINE_YES) {
            $data = $this->_getOnlineChannels($inputDatas);
        } elseif ($type->is_online === SystemFinanceType::IS_ONLINE_NO) {
            $data = $this->_getOfflineChannels($inputDatas);
        }
        $msgOut = msgOut($data);
        return $msgOut;
    }

    /**
     * 获取线上支付方式
     * @param array $inputDatas InputDatas.
     * @return mixed[]
     */
    private function _getOnlineChannels(array $inputDatas): array
    {
        $financeIds = SystemFinanceUserTag::where(
            [
             'is_online' => SystemFinanceType::IS_ONLINE_YES,
             'tag_id'    => $inputDatas['tag_id'],
            ],
        )->get()->pluck('finance_id');
        $data       = SystemFinanceOnlineInfo::where(
            [
             'platform_sign' => $inputDatas['platform_sign'],
             'status'        => SystemFinanceOnlineInfo::STATUS_YES,
            ],
        )->whereIn('id', $financeIds)->get(
            [
             'id',
             'frontend_name',
             'frontend_remark',
             'min',
             'max',
             'handle_fee',
             'merchant_no',
             'desc',
            ],
        )->toArray();
        return $data;
    }

    /**
     * 获取线下支付方式
     * @param array $inputDatas InputDatas.
     * @return mixed[]
     */
    private function _getOfflineChannels(array $inputDatas): array
    {
        $financeIds = SystemFinanceUserTag::where(
            [
             'is_online' => SystemFinanceType::IS_ONLINE_NO,
             'tag_id'    => $inputDatas['tag_id'],
            ],
        )->get()->pluck('finance_id');
        $data       = SystemFinanceOfflineInfo::with('bank:id,name,code')->where(
            [
             'type_id' => $inputDatas['type_id'],
             'status'  => SystemFinanceOfflineInfo::STATUS_YES,
            ],
        )->whereIn('id', $financeIds)->get(
            [
             'id',
             'bank_id',
             'type_id',
             'name',
             'remark',
             'min',
             'max',
             'fee',
            ],
        )->toArray();
        return $data;
    }
}
