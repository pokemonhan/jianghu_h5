<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendAdminAccessGroupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_admin_access_group_details', function (Blueprint $table) {
            $table->increments('id');
            $table->collation = 'utf8mb4_0900_ai_ci';
            $table->integer('group_id')->nullable()->default(null)->comment('管理员组ID')->unsigned();
            $table->integer('menu_id')->nullable()->default(null)->comment('总后台菜单ID');

            $table->index('group_id', 'fk_backend_admin_access_group_details_1_idx');
            $table->nullableTimestamps();

            $table->foreign('group_id', 'fk_backend_admin_access_group_details_1')
                ->references('id')->on('backend_admin_access_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_admin_access_group_details');
    }
}
