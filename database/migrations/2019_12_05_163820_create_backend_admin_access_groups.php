<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendAdminAccessGroups extends Migration
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
            $table->string('group_name',15)->comment('管理员组名称');
            $table->unsignedInteger('status')->nullable()->comment('状态：0关闭 1开启');
            $table->unsignedInteger('recharge_status')->nullable()->comment('充值状态：0关闭 1开启');
            $table->timestamps();
        });
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
