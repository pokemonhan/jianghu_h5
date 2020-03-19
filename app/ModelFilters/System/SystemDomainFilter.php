<?php

namespace App\ModelFilters\System;

use EloquentFilter\ModelFilter;

/**
 * Class GameFilter
 *
 * @package App\ModelFilters\Game
 */
class SystemDomainFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * 平台标识
     * @param  string $sign 标识.
     * @return $this
     */
    public function sign(string $sign): SystemDomainFilter
    {
        $eloq = $this->where('platform_sign', $sign);
        return $eloq;
    }

    /**
     * 类型
     * @param  integer $type 类型.
     * @return $this
     */
    public function type(int $type): SystemDomainFilter
    {
        $eloq = $this->where('type', $type);
        return $eloq;
    }

    /**
     * 状态
     * @param  integer $status 状态.
     * @return $this
     */
    public function status(int $status): SystemDomainFilter
    {
        $eloq = $this->where('status', $status);
        return $eloq;
    }

    /**
     * 域名
     * @param  string $domain 域名.
     * @return $this
     */
    public function domain(string $domain): SystemDomainFilter
    {
        $eloq = $this->where('domain', $domain);
        return $eloq;
    }

    /**
     * 生成时间
     * @param  array $createdStr 生成时间.
     * @return $this
     */
    public function createdAt(array $createdAt): SystemDomainFilter
    {
        if (!is_array($createdAt) || count($createdAt) !== 2) {
            $eloq = $this;
        } else {
            $eloq = $this->whereBetween('created_at', $createdAt);
        }
        return $eloq;
    }
}
