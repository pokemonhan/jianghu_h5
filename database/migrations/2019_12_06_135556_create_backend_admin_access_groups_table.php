<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendAdminAccessGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_admin_access_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->collation = 'utf8mb4_0900_ai_ci';
            $table->string('group_name', 15)->comment('管理员组名称')->collation('utf8_general_ci');
            $table->tinyInteger('status')->nullable()->default('1')->comment('状态：0关闭 1开启');
            $table->tinyInteger('recharge_status')->nullable()->default('0')->comment('充值状态：0关闭 1开启');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `backend_admin_access_groups` comment '后台角色组'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_admin_access_groups');
    }
}
