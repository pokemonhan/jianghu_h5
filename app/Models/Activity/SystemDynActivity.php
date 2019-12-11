<?php

namespace App\Models\Activity;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class SystemDynActivity
 *
 * @package App\Models\Activity
 */
class SystemDynActivity extends BaseModel
{

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];


    /**
     * @param  integer $value Value.
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
}
