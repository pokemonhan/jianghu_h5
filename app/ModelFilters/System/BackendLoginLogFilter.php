<?php

namespace App\ModelFilters\System;

use EloquentFilter\ModelFilter;

/**
 * 管理员登录日志
 */
class BackendLoginLogFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * 邮箱查询
     *
     * @param  string $email 邮箱.
     * @return $this
     */
    public function email(string $email)
    {
        return $this->where('email', $email);
    }

    /**
     * 用户名查询
     *
     * @param  string $name 用户名.
     * @return $this
     */
    public function name(string $name)
    {
        return $this->whereLike('name', $name);
    }

    /**
     * IP查询
     *
     * @param  string $loginIp IP.
     * @return $this
     */
    public function loginIp(string $loginIp)
    {
        return $this->where('ip', $loginIp);
    }

    /**
     * 登录时间查询
     *
     * @param  string $createAt 登录时间.
     * @return $this
     */
    public function createAt(string $createAt)
    {
        $createTime = json_decode($createAt, true);
        return $this->whereBetween('created_at', $createTime);
    }
}
