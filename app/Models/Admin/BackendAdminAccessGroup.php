<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use App\Models\DeveloperUsage\Backend\BackendAdminAccessGroupDetail;

/**
 * Class for backend admin access group.
 */
class BackendAdminAccessGroup extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * Gets the table columns.
     *
     * @return array
     */
    public function getTableColumns()
    {
        return $this
            ->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->getTable());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adminUsers()
    {
        return $this->hasMany(BackendAdminUser::class, 'group_id', 'id')
            ->select(['id', 'name', 'email', 'is_test', 'status', 'platform_id', 'group_id']);
    }

    /**
     * 连带管理员一起删除
     *
     * @return mixed
     */
    public function delete()
    {
        $this->adminUsers()->delete();
        return parent::delete();
    }

    /**
     * 管理员组权限
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail()
    {
        return $this->hasMany(BackendAdminAccessGroupDetail::class, 'group_id', 'id');
    }
}
