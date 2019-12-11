<?php

namespace App\Http\SingleActions\Backend\Headquarters\SystemBank;

use App\Models\Finance\SystemBank;

/**
 * Class BaseAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\SystemBank
 */
class BaseAction
{
    /**
     * @var SystemBank $model
     */
    protected $model;

    /**
     * BaseAction constructor.
     *
     * @param SystemBank $systemBank SystemBank.
     */
    public function __construct(SystemBank $systemBank)
    {
        $this->model = $systemBank;
    }
}
