<?php

use App\Models\User\FrontendUsersAccount;
use Illuminate\Database\Seeder;

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
    public function run(): void
    {
        FrontendUsersAccount::insert(
            [
                [
                    'uid' => 189673,
                    'balance' => 999022347.8236,
                    'frozen' => 86853.2200,
                    'status' => 1,
                    'pic_path' => '/storage/avatar/avatar.png',
                ],
                [
                    'uid' => 189674,
                    'balance' => 173114.1489,
                    'frozen' => 17360.0000,
                    'status' => 1,
                    'pic_path' => '/storage/avatar/avatar.png',
                ],
            ],
        );
    }
}
