<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminGroup;

use App\Models\Admin\MerchantAdminAccessGroup;
use Illuminate\Http\JsonResponse;

/**
 * Class for index action.
 */
class IndexAction
{
    /**
     * @var object MerchantAdminAccessGroup
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
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        $data = $this->model->get()->toArray();
        
        return msgOut(true, $data);
    }
}
