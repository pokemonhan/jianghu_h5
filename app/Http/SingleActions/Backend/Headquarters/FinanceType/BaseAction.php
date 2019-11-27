<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceType;

use App\Models\Finance\SystemFinanceType;

/**
 * Class BaseAction
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceType
 */
class BaseAction
{
    /**
     * @var SystemFinanceType
     */
    protected $model;

    /**
     * BaseAction constructor.
     * @param SystemFinanceType $systemFinanceType SystemFinanceType.
     */
    public function __construct(SystemFinanceType $systemFinanceType)
    {
        $this->model = $systemFinanceType;
    }
}
