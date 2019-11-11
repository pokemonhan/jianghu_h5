<?php

namespace App\Http\SingleActions\Backend\Headquarters\Admin;

use App\Models\Admin\BackendAdminAccessGroup;
use Illuminate\Http\JsonResponse;

/**
 * Class for partner admin group index action.
 */
class PartnerAdminGroupIndexAction
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
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        $data = $this->model::all()->toArray();
        return msgOut(true, $data);
    }
}
