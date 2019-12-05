<?php

namespace App\ModelFilters\System;

use EloquentFilter\ModelFilter;

/**
 * Class GameFilter
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
     *
     * @param string $sign 标识.
     * @return $this
     */
    public function sign(string $sign)
    {
        return $this->where('platform_sign', $sign);
    }
}
