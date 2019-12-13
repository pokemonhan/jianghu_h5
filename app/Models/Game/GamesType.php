<?php

namespace App\Models\Game;

use App\ModelFilters\Game\GamesTypeFilter;
use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class GamesType
 * @package App\Models\Game
 */
class GamesType extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public function lastEditor()
    {
        return $this->belongsTo(BackendAdminUser::class, 'last_editor_id', 'id');
    }

    /**
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(BackendAdminUser::class, 'author_id', 'id');
    }

    /**
     * @return mixed
     */
    public function modelFilter()
    {
        return $this->provideFilter(GamesTypeFilter::class);
    }
}
