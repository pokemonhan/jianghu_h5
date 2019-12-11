<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'system_emails',
            static function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('is_timing')->default('0')->comment('是否是定时发送  0 不是 1 是');
                $table->tinyInteger('is_send')->default('0')->comment('是否发送 0 未发送 1 已发送');
                $table->string('title')->default(' ')->comment('邮件标题');
                $table->binary('content')->nullable()->default(null)->comment('邮件内容');
                $table->timestamp('send_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('发送时间');
                $table->tinyInteger('sender_type')->default('1')->comment('发送人类型 1 总控 2 厅主 3 会员');
                $table->tinyInteger('receiver_type')->default('0')->comment('接收人类型 3会员 2 厅主 1总控');
                $table->integer('sender_id')->default('0');
                $table->text('receivers')->nullable()->default(null)->comment('接收人');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
            },
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_emails');
    }
}
