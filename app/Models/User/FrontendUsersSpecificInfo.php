<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class FrontendUsersSpecificInfo extends Model
{
    /**
     * 隐藏手机号中间四位 ****
     */
    public function getMobileAttribute($value)
    {
        return $this->attributes['mobile'] = substr_replace($value,'****',3,4);
    }
}
