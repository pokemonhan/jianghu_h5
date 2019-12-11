<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users_login_logs',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->collation = 'utf8mb4_0900_ai_ci';
                $table->string('platform_sign', 32)->nullable()->default(null)->comment('平台标识');
                $table->integer('user_id')->nullable()->default(null)->comment('用户id');
                $table->timestamp('last_login_time')->nullable()->default(null)->comment('最后登陆时间');
                $table->string('last_login_ip', 16)->nullable()->default(null)->comment('最后登陆IP');
                $table->string('last_login_device', 128)->nullable()->default(null)->comment('最后登陆的设备');
                $table->nullableTimestamps();
            },
        );
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `users_login_logs` comment '用户登录日志表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_login_logs');
    }
}
