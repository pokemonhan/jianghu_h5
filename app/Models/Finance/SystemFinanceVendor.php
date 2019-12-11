<?php

namespace App\Models\Finance;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class SystemFinanceVendor
 * @package App\Models\Finance
 */
class SystemFinanceVendor extends BaseModel
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
     * @param array $value Value.
     * @return false|string
     */
    public function setWhitelistIpsAttribute(array $value)
    {
        if (!empty($value)) {
            return json_encode($value);
        } else {
            return '';
        }
    }
}
