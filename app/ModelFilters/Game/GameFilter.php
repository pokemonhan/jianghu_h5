<?php

namespace App\ModelFilters\Game;

use App\Models\Platform\GamesPlatform;
use EloquentFilter\ModelFilter;

/**
 * Class GameFilter
 *
 * @package App\ModelFilters\Game
 */
class GameFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * @param  integer $game_id Game_id.
     * @return GameFilter
     */
    public function game(int $game_id)
    {
        return $this->where('id', $game_id);
    }

    /**
     * @param  integer $vendor_id Vendor_id.
     * @return GameFilter
     */
    public function vendor(int $vendor_id)
    {
        return $this->where('vendor_id', $vendor_id);
    }

    /**
     * @param  integer $type_id Type_id.
     * @return GameFilter
     */
    public function type(int $type_id)
    {
        return $this->where('type_id', $type_id);
    }

    /**
     * @param  string $unassign_platform_sign Unassign_platform_sign.
     * @return GameFilter|\Illuminate\Database\Query\Builder
     */
    public function unassignPlatformSign(string $unassign_platform_sign)
    {
        $assignedGames = GamesPlatform::where('platform_sign', $unassign_platform_sign)->get()->pluck('game_sign')->toArray();
        return $this->whereNotIn('sign', $assignedGames);
    }

    /**
     * @param  string $assigned_platform_sign Assigned_platform_sign.
     * @return GameFilter|\Illuminate\Database\Query\Builder
     */
    public function assignedPlatformSign(string $assigned_platform_sign)
    {
        $assignedGames = GamesPlatform::where('platform_sign', $assigned_platform_sign)->get()->pluck('game_sign')->toArray();
        return $this->whereIn('sign', $assignedGames);
    }
}
