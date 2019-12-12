<?php

namespace App\Models\Game;

use App\Models\BaseModel;

/**
 * Class GameTypePlatform
 *
 * @package App\Models\Game
 */
class GameTypePlatform extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var integer
     */
    public const DEVICE_H5 = 2;
    /**
     * @var integer
     */
    public const DEVICE_APP = 3;
    /**
     * @var integer
     */
    public const DEVICE_PC = 1;

    /**
     * @return mixed
     */
    public function gameType()
    {
        return $this->belongsTo(GamesType::class, 'type_id', 'id');
    }

}
