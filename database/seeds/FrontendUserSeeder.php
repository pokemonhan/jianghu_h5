<?php

use App\Models\User\FrontendUser;
use App\Models\User\FrontendUsersSpecificInfo;
use Illuminate\Database\Seeder;

/**
 * Class FrontendUserSeeder
 */
class FrontendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = factory(FrontendUser::class)->times(600);
        FrontendUser::insert($users->make()->makeVisible(['password'])->toArray());
        $user = FrontendUser::find(2);
        $user->mobile = 18844446666;
        $user->save();
    }
}
