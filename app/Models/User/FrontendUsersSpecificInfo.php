<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FrontendUsersSpecificInfo
 * @package App\Models\User
 */
class FrontendUsersSpecificInfo extends Model
{

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'mobile',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['mobile_hidden'];

    /**
     * 隐藏手机号中间四位 ****
     * @return string
     */
    public function getMobileHiddenAttribute()
    {
        return substr_replace($this->attributes['mobile'], '****', 3, 4);
    }
}
