<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Models\Admin\BackendAdminAccessGroup;
use Illuminate\Http\JsonResponse;

/**
 * Class for partner admin group specific group users action.
 */
class PartnerAdminGroupSpecificGroupUsersAction
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
        $accessGroupEloq = $this->model::find($inputDatas['id']);
        if ($accessGroupEloq !== null) {
            $data = $accessGroupEloq->adminUsers->toArray();
            return msgOut(true, $data);
        } else {
            return msgOut(false, [], '100202');
        }
    }
}
