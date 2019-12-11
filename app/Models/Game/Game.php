<?php

namespace App\Models\Game;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class Game
 * @package App\Models\Game
 */
class Game extends BaseModel
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
    public function vendor()
    {
        return $this->belongsTo(GamesVendor::class, 'vendor_id', 'id');
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(GamesType::class, 'type_id', 'id');
    }
}
