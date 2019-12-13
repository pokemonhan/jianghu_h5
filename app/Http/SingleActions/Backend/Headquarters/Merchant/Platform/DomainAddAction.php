<?php

namespace App\Http\SingleActions\Backend\Headquarters\Merchant\Platform;

use App\Models\Systems\SystemDomain;
use Illuminate\Http\JsonResponse;

/**
 * Class for merchant admin user do add action.
 */
class DomainAddAction
{

    /**
     * @var SystemDomain
     */
    protected $model;

    /**
     * @param SystemDomain $systemDomain 域名.
     */
    public function __construct(SystemDomain $systemDomain)
    {
        $this->model = $systemDomain;
    }

    /**
     * @param  array $inputDatas 接收的参数.
     * @throws \Exception Exception.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $checkDomainPrefix = $this->model->checkDomainPrefix($inputDatas['domain'], $inputDatas['type']);
        if ($checkDomainPrefix === false) {
            throw new \Exception('302002');
        }
        $this->model->insertDomain($inputDatas);
        return msgOut(true, ['domain' => $inputDatas['domain']]);
    }
}
