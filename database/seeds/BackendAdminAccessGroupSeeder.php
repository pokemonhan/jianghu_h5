<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\BackendAdminAccessGroup;

/**
 * Class BackendAdminAccessGroupSeeder
 */
class BackendAdminAccessGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackendAdminAccessGroup::insert(
            [
                'id' => 1,
                'group_name' => '超级管理组',
                'status' => 1,
                'recharge_status' => 0,
            ],
        );
    }
}
