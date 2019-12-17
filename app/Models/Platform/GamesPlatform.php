<?php

namespace App\Models\Platform;

use App\Models\BaseModel;
use App\Models\Game\Game;
use App\Models\Game\GamesType;
use App\Models\Game\GamesVendor;

/**
 * Class GamesPlatform
 *
 * @package App\Models\Platform
 */
class GamesPlatform extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return object
     */
    public function games(): object
    {
        return $this->belongsTo(Game::class,'game_sign','sign');
    }

    /**
     * @return object
     */
    public function vendor(): object
    {
        return $this->hasOneThrough(GamesVendor::class, Game::class, 'sign','id','game_sign','vendor_id');
    }

    public function type(): object
    {
        return $this->hasOneThrough(GamesType::class, Game::class, 'sign','id','game_sign','type_id');
    }
}
