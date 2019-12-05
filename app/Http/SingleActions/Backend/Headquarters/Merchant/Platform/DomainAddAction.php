<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\Platform;

use App\Models\Systems\SystemDomain;
use Illuminate\Http\JsonResponse;
use App\ModelFilters\System\SystemDomainFilter;

/**
 * Class for merchant admin user do add action.
 */
class DomainAddAction
{
    
    /**
     * @var SystemDomain
     */
    private $model;

    /**
     * @param SystemDomain $systemDomain 域名.
     */
    public function __construct(SystemDomain $systemDomain)
    {
        $this->model = $systemDomain;
    }

    /**
     * @param array $inputDatas 接收的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $systemDomain = $this->model;
        $systemDomain->fill($inputDatas);
        $systemDomain->save();
        return msgOut(true, ['domain' => $systemDomain->domain]);
    }
}
