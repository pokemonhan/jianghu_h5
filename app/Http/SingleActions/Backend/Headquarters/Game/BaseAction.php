<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use App\Models\Game\Games;

/**
 * Class BaseAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class BaseAction
{
    /**
     * @var Games Model.
     */
    protected $model;

    /**
     * BaseAction constructor.
     */
    public function __construct()
    {
        $this->model = new Games();
    }
}
