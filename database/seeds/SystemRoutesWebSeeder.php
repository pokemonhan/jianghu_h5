<?php

use Illuminate\Database\Seeder;
use App\Models\DeveloperUsage\Frontend\SystemRoutesWeb;

/**
 * Class SystemRoutesWebSeeder
 */
class SystemRoutesWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemRoutesWeb::insert(
            [
                [
                    'route_name' => 'app-api.login',
                    'method' => 'login',
                    'is_open' => 1,
                ],
                [
                    'route_name' => 'app-api.logout',
                    'method' => 'logout',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'app-api.user.refresh-token',
                    'method' => 'refreshToken',
                    'is_open' => 0,
                ],
                [
                    'route_name' => 'app-api.games-lobby.rich-list',
                    'method' => 'richList',
                    'is_open' => 0,
                ],
            ],
        );
    }
}
