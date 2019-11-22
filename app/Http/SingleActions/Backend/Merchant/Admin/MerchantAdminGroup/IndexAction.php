<?php

namespace App\Http\SingleActions\Backend\Merchant\Admin\MerchantAdminGroup;

use App\Http\Controllers\BackendApi\Merchant\MerchantApiMainController;
use App\Models\Admin\MerchantAdminAccessGroup;
use Illuminate\Http\JsonResponse;
use App\ModelFilters\Admin\MerchantAdminAccessGroupFilter;

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
     * @param MerchantApiMainController $contll Controller.
     * @return JsonResponse
     */
    public function execute(MerchantApiMainController $contll): JsonResponse
    {
        $platform = ['platform' => $contll->currentPlatformEloq->sign];
        $data = $this->model::filter($platform, MerchantAdminAccessGroupFilter::class)->get()->toArray();
        
        return msgOut(true, $data);
    }
}
