<?php

namespace App\Models\Game;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class GamesVendor
 * @package App\Models\Game
 */
class GamesVendor extends BaseModel
{

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @param integer $value Value.
     * @return string|null
     */
    public function getLastEditorIdAttribute(int $value)
    {
        if (!empty($value)) {
            return BackendAdminUser::find($value)->name;
        } else {
            return null;
        }
    }


    /**
     * @param integer $value Value.
     * @return string|null
     */
    public function getAuthorIdAttribute(int $value)
    {
        if (!empty($value)) {
            return BackendAdminUser::find($value)->name;
        } else {
            return null;
        }
    }
}
