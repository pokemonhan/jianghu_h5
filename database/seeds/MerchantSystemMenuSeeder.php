<?php

use Illuminate\Database\Seeder;
use App\Models\DeveloperUsage\Menu\MerchantSystemMenu;

/**
 * Class MerchantSystemMenuSeeder
 */
class MerchantSystemMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantSystemMenu::insert(
            [
                'label' => '新父级菜单',
                'en_name' => 'bbb.bb',
                'route' => '#',
                'pid' => 0,
                'display' => 1,
            ],
        );
    }
}
