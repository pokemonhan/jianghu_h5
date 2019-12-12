<?php

use Illuminate\Database\Seeder;
use \App\Models\User\FrontendUsersAccount;

/**
 * Class FrontendUserAccountSeeder
 */
class FrontendUserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontendUsersAccount::insert(
            [
                [
                    'user_id' => '1',
                    'balance' => 999022347.8236,
                    'frozen' => 86853.2200,
                    'status' => 1,
                ],
                [
                    'user_id' => '2',
                    'balance' => 173114.1489,
                    'frozen' => 17360.0000,
                    'status' => 1,
                ],
            ],
        );
    }
}
