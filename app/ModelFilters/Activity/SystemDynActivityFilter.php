<?php

namespace App\ModelFilters\Activity;

use EloquentFilter\ModelFilter;

/**
 * Class SystemBankFilter
 * @package App\ModelFilters\Finance
 */
class SystemDynActivityFilter extends ModelFilter
{

    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    /**
     * @param integer $status Status.
     * @return object
     */
    public function status(int $status) :object
    {
        return $this->where('status', $status);
    }

    /**
     * @param string $name Name.
     * @return object
     */
    public function name(string $name) :object
    {
        return $this->where('name', $name);
    }
}
