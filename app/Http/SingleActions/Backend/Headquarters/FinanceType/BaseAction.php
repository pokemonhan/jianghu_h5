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
     */
    public function __construct()
    {
        $this->model = new SystemFinanceType();
    }
}
