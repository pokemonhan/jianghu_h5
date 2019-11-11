<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Http\Controllers\BackendApi\BackEndApiMainController;
use App\Models\Admin\BackendAdminAccessGroup;
use App\Models\DeveloperUsage\Menu\BackendSystemMenu;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

/**
 * Class for partner admin group create action.
 */
class PartnerAdminGroupCreateAction
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
     * Show the form for creating a new resource.
     * @param BackEndApiMainController $contll     Controller.
     * @param array                    $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas): JsonResponse
    {
        try {
            $data['platform_id'] = $contll->currentPlatformEloq->platform_id;
            $data['group_name'] = $inputDatas['group_name'];
            $data['role'] = $inputDatas['role'];
            $role = $inputDatas['role'] === '*' ?
            Arr::wrap($inputDatas['role']) : Arr::wrap(json_decode($inputDatas['role'], true));
            $objPartnerAdminGroup = $this->model;
            $objPartnerAdminGroup->fill($data);
            $objPartnerAdminGroup->save();
        } catch (Exception $e) {
            return msgOut(false, [], $e->getCode(), $e->getMessage());
        }
        $partnerMenuObj = new BackendSystemMenu();
        $partnerMenuObj->createMenuDatas($objPartnerAdminGroup->id, $role);
        return msgOut(true, $data);
    }
}
