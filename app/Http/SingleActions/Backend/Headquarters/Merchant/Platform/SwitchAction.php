<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\Platform;

use App\Models\SystemPlatform;
use Illuminate\Http\JsonResponse;

/**
 * Class for system platform switch action.
 */
class SwitchAction
{
    /**
     * @var SystemPlatform
     */
    private $model;

    /**
     * @param SystemPlatform $systemPlatform 代理商平台.
     */
    public function __construct(SystemPlatform $systemPlatform)
    {
        $this->model = $systemPlatform;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @throws \Exception
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $platformEloq = $this->model::find($inputDatas['id']);
        if ($platformEloq !== null) {
            $platformEloq->status = $inputDatas['status'];
            $platformEloq->save();
        } else {
            throw new \Exception('300706');
        }
        return msgOut(true);
    }
}
