<?php

namespace App\Http\SingleActions\Backend\Headquarters\FinanceChannel;

use App\Models\Finance\SystemFinanceChannel;

/**
 * Class BaseAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\FinanceChannel
 */
class BaseAction
{
    /**
     * @var SystemFinanceChannel $model
     */
    protected $model;

    /**
     * BaseAction constructor.
     *
     * @param SystemFinanceChannel $systemFinanceChannel SystemFinanceChannel.
     */
    public function __construct(SystemFinanceChannel $systemFinanceChannel)
    {
        $this->model = $systemFinanceChannel;
    }
}
