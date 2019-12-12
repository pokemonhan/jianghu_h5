<?php

namespace App\Models\Game;

use App\Models\BaseModel;
use EloquentFilter\Filterable;

/**
 * Class GameTypePlatform
 *
 * @package App\Models\Game
 */
class GameTypePlatform extends BaseModel
{
    use Filterable;
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

    public function scopeFilter($query, array $input = [], $filter = null)
    {
        // Resolve the current Model's filter
        if ($filter === null) {
            $filter = $this->getModelFilterClass();
        }
//        echo $filter;
        // Create the model filter instance
        $modelFilter = new $filter($query, $input);

        // Set the input that was used in the filter (this will exclude empty strings)
        $this->filtered = $modelFilter->input();

        // Return the filter query
        return $modelFilter->handle();
    }
}
