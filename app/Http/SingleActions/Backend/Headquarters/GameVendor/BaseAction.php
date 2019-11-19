<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameVendor;

use App\Models\Game\GamesVendor;

/**
 * Class BaseAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameVendor
 */
class BaseAction
{
    /**
     * @var GamesVendor Model.
     */
    protected $model;

    /**
     * BaseAction constructor.
     */
    public function __construct()
    {
        $this->model = new GamesVendor();
    }
}
