<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendAdminAccessGroupDetails extends Migration
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
            $table->unsignedInteger('group_id')->nullable()->comment('管理员组ID')->index('fk_backend_admin_access_group_details_1_idx');
            $table->unsignedInteger('menu_id')->nullable()->comment('总后台菜单ID');
            $table->foreign('group_id','fk_backend_admin_access_group_details_1')->references('id')->on('backend_admin_access_groups')->onDelete('cascade');
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
        Schema::dropIfExists('backend_admin_access_group_details');
    }
}
