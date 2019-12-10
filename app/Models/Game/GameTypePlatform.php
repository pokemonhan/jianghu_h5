<?php

namespace App\Models\Game;

use App\Models\BaseModel;

/**
 * Class GameTypePlatform
 * @package App\Models\Game
 */
class GameTypePlatform extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var string
     */
    public const DEVICE_H5 = 'H5';
    /**
     * @var string
     */
    public const DEVICE_APP = 'APP';
    /**
     * @var string
     */
    public const DEVICE_PC = 'PC';
}
