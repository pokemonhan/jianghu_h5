<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\BackendAdminAccessGroupDetail;

/**
 * Class BackendAdminAccessGroupDetailSeeder
 */
class BackendAdminAccessGroupDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackendAdminAccessGroupDetail::insert(
            [
                'group_id' => 1,
                'menu_id' => 1,
            ],
        );
    }
}
