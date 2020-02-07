<?php

use App\Models\User\FrontendUser;
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
        $balance = 1000000000.99;
        FrontendUser::all()->map(function ($item) use($balance) {
            $item->account()->create([
                'balance' => $balance - $item->id,
            ]);
        });
    }
}
