<?php namespace App\ModelFilters\Admin;

use EloquentFilter\ModelFilter;

/**
 * Class for merchant admin user filter.
 */
class MerchantAdminUserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    /**
     * @param string $platformSign PlatformSign.
     *
     * @return \App\Models\Admin\MerchantAdminUser
     */
    public function platform(string $platformSign)
    {
        return $this->where('platform_sign', $platformSign);
    }

    /**
     * @param string $groupName GroupName.
     *
     * @return \App\Models\Admin\MerchantAdminUser
     */
    public function groupName(string $groupName)
    {
        return $this->where('group_name', $groupName);
    }
}
