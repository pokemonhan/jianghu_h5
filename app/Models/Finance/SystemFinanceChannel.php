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
     * @var array
     */
    protected $appends = ['last_editor_name', 'author_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastEditor()
    {
        return $this->belongsTo(BackendAdminUser::class, 'last_editor_id', 'id')->select('id', 'name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(BackendAdminUser::class, 'author_id', 'id');
    }

    /**
     * @return string|null
     */
    public function getLastEditorNameAttribute()
    {
        if (!isset($this->lastEditor)) {
            return null;
        } else {
            return $this->lastEditor->name;
        }
    }

    /**
     * @return string|null
     */
    public function getAuthorNameAttribute()
    {
        if (!isset($this->author)) {
            return null;
        } else {
            return $this->author->name;
        }
    }
}
