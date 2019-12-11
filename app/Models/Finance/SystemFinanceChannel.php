<?php

namespace App\Models\Finance;

use App\Models\Admin\BackendAdminUser;
use App\Models\BaseModel;

/**
 * Class SystemFinanceChannel
 * @package App\Models\Finance
 */
class SystemFinanceChannel extends BaseModel
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
}
