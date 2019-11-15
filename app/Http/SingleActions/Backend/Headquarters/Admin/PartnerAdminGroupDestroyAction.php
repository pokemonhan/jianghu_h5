<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Models\Admin\BackendAdminAccessGroup;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class for partner admin group destroy action.
 */
class PartnerAdminGroupDestroyAction
{
    /**
     * @var BackendAdminAccessGroup
     */
    protected $model;

    /**
     * @param BackendAdminAccessGroup $backendAdminAccessGroup BackendAdminAccessGroup.
     */
    public function __construct(BackendAdminAccessGroup $backendAdminAccessGroup)
    {
        $this->model = $backendAdminAccessGroup;
    }

    /**
     * @param array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $id = $inputDatas['id'];
        $datas = $this->model->where([
            ['id', $id],
            ['group_name', $inputDatas['group_name']],
        ])->first();
        if ($datas === null) {
            return msgOut(false, [], '300100');
        }
        try {
            $datas->delete();
            return msgOut(true);
        } catch (Exception $e) {
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
    }
}
