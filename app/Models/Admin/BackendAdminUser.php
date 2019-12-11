<?php

namespace App\Models\Admin;

use App\Models\SystemPlatform;
use Illuminate\Notifications\Notifiable;
use App\Models\BaseAuthModel;

/**
 * Class for backend admin user.
 */
class BackendAdminUser extends BaseAuthModel
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * 平台
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function platform()
    {
        return $this->hasOne(SystemPlatform::class, 'id', 'platform_id');
    }

    /**
     * 角色组
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accessGroup()
    {
        return $this->hasOne(BackendAdminAccessGroup::class, 'id', 'group_id');
    }
}
