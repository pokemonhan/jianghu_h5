<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin\BackendAdminGroup;

use App\Models\Admin\BackendAdminAccessGroup;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class for destroy action.
 */
class DestroyAction
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
     * @param  array $inputDatas 传递的参数.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $id = $inputDatas['id'];
        $datas = $this->model->where(
            [
            ['id', $id],
            ['group_name', $inputDatas['group_name']],
            ]
        )->first();
        if ($datas === null) {
            throw new \Exception('300100');
        }
        try {
            $datas->delete(); //管理员关联外键一起删除
            return msgOut(true);
        } catch (Exception $e) {
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
    }
}
