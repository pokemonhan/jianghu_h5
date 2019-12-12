<?php

namespace App\Models\User;

use App\Models\BaseAuthModel;

/**
 * Class FrontendUsersSpecificInfo
 *
 * @package App\Models\User
 */
class FrontendUsersSpecificInfo extends BaseAuthModel
{

    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];
}
