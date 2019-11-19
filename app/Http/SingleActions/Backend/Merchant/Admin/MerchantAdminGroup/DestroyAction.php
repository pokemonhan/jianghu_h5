<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminGroup;

use App\Models\Admin\MerchantAdminAccessGroup;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class for destroy action.
 */
class DestroyAction
{
    /**
     * @var MerchantAdminAccessGroup
     */
    protected $model;

    /**
     * @param MerchantAdminAccessGroup $merchantAdminAccessGroup MerchantAdminAccessGroup.
     */
    public function __construct(MerchantAdminAccessGroup $merchantAdminAccessGroup)
    {
        $this->model = $merchantAdminAccessGroup;
    }

    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $id = $inputDatas['id'];
        $adminGroupELoq = $this->model->where([
            ['id', $id],
            ['group_name', $inputDatas['group_name']],
        ])->first();
        if ($adminGroupELoq === null) {
            return msgOut(false, [], '300100');
        }
        try {
            $adminGroupELoq->delete();
            return msgOut(true);
        } catch (Exception $e) {
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
    }
}
