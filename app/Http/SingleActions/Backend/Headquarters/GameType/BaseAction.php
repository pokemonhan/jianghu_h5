<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use App\Models\Game\GamesType;

/**
 * Class BaseAction
 * @package App\Http\SingleActions\Backend\Headquarters\GameType
 */
class BaseAction
{
    /**
     * @var GamesType Model.
     */
    protected $model;

    /**
     * BaseAction constructor.
     */
    public function __construct()
    {
        $this->model = new GamesType();
    }
}
