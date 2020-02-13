<?php

use App\Models\DeveloperUsage\Frontend\SystemRoutesH5;
use Illuminate\Database\Seeder;

/**
 * Class SystemRoutesH5Seeder
 */
class SystemRoutesH5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SystemRoutesH5::insert(
            [
             [
              'route_name'        => 'h5-api.login',
              'controller'        => null,
              'method'            => 'login',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.logout',
              'controller'        => null,
              'method'            => 'logout',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.password.change-code',
              'controller'        => null,
              'method'            => 'passwordChangeCode',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.password.change',
              'controller'        => null,
              'method'            => 'passwordChange',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.user.refresh-token',
              'controller'        => null,
              'method'            => 'refreshToken',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.games-lobby.games-categories',
              'controller'        => null,
              'method'            => 'category',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.games-lobby.slides',
              'controller'        => null,
              'method'            => 'slides',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.user.information',
              'controller'        => null,
              'method'            => 'information',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.user.game-list',
              'controller'        => null,
              'method'            => 'gameList',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.register',
              'controller'        => null,
              'method'            => 'store',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.user.reset-password',
              'controller'        => null,
              'method'            => 'password',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.reset-password.verification-code',
              'controller'        => null,
              'method'            => 'passwordCode',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.user.security-code',
              'controller'        => null,
              'method'            => 'security',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.register.verification-code',
              'controller'        => null,
              'method'            => 'code',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.recharge.types',
              'controller'        => null,
              'method'            => 'types',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.recharge.channels',
              'controller'        => null,
              'method'            => 'channels',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.recharge.recharge',
              'controller'        => null,
              'method'            => 'recharge',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.security-verification-code',
              'controller'        => null,
              'method'            => 'securityCode',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 1,
             ],
             [
              'route_name'        => 'h5-api.user.grades',
              'controller'        => null,
              'method'            => 'grades',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.system-avatar',
              'controller'        => null,
              'method'            => 'avatar',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.system.banks',
              'controller'        => null,
              'method'            => 'banks',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.games-lobby.in-game',
              'controller'        => null,
              'method'            => 'inGame',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.recharge.get-finance-info',
              'controller'        => null,
              'method'            => 'getFinanceInfo',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.user.dynamic-information',
              'controller'        => null,
              'method'            => 'dynamicInformation',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.destroy',
              'controller'        => null,
              'method'            => 'accountDestroy',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.withdraw',
              'controller'        => null,
              'method'            => 'withdraw',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.recentness',
              'controller'        => null,
              'method'            => 'recent',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.records',
              'controller'        => null,
              'method'            => 'record',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.promotion-gifts',
              'controller'        => null,
              'method'            => 'promotionGift',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.weekly-gifts',
              'controller'        => null,
              'method'            => 'weeklyGift',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.destroy',
              'controller'        => null,
              'method'            => 'accountDestroy',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.withdraw',
              'controller'        => null,
              'method'            => 'withdraw',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.recentness',
              'controller'        => null,
              'method'            => 'recent',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.records',
              'controller'        => null,
              'method'            => 'record',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.promotion-gifts',
              'controller'        => null,
              'method'            => 'promotionGift',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.weekly-gifts',
              'controller'        => null,
              'method'            => 'weeklyGift',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.list',
              'controller'        => null,
              'method'            => 'accountList',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.bank-card.binding',
              'controller'        => null,
              'method'            => 'bankCardBinding',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.alipay.binding',
              'controller'        => null,
              'method'            => 'aliPayBinding',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.bank-card.first-binding',
              'controller'        => null,
              'method'            => 'bankCardFirstBinding',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.alipay.first-binding',
              'controller'        => null,
              'method'            => 'aliPayFirstBinding',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
             [
              'route_name'        => 'h5-api.account.fund-password.check',
              'controller'        => null,
              'method'            => 'fundPasswordCheck',
              'frontend_model_id' => null,
              'title'             => null,
              'description'       => null,
              'is_open'           => 0,
             ],
            ],
        );
    }
}
