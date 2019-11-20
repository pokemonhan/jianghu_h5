<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use App\Models\Game\Games;
use Illuminate\Http\JsonResponse;

/**
 * Class DelDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameType
 */
class DelDoAction extends BaseAction
{
    /**
     * @param array $inputDatas InputDatas.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas) :JsonResponse
    {
        if (!Games::where('vendor_id', $inputDatas['id'])->get()->isEmpty()) {
            throw new \Exception('300400');
        }
        if ($this->model->where('id', $inputDatas['id'])->delete()) {
            return msgOut(true, [], '200', '删除成功');
        }
        throw new \Exception('300401');
    }
}
