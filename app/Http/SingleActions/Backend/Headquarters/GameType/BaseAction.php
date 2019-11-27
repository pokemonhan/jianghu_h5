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
     * @param GamesType $gamesType GamesType.
     */
    public function __construct(GamesType $gamesType)
    {
        $this->model = $gamesType;
    }
}
