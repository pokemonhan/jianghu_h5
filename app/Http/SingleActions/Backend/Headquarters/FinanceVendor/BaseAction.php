<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceVendor;

use App\Models\Finance\SystemFinanceVendor;

/**
 * Class BaseAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceVendor
 */
class BaseAction
{
    /**
     * @var SystemFinanceVendor
     */
    protected $model;

    /**
     * BaseAction constructor.
     *
     * @param SystemFinanceVendor $systemFinanceVendor SystemFinanceVendor.
     */
    public function __construct(SystemFinanceVendor $systemFinanceVendor)
    {
        $this->model = $systemFinanceVendor;
    }
}
