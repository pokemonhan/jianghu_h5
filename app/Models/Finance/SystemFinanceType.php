<?php

namespace App\Models\Finance;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class SystemFinanceType
 * @package App\Models\Finance
 */
class SystemFinanceType extends BaseModel
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
        if (isset($value) && $value !== 0) {
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
        if (isset($value) && $value !== 0) {
            return BackendAdminUser::find($value)->name;
        } else {
            return null;
        }
    }
}
