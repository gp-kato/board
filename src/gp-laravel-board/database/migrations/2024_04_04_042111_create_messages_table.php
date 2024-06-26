<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id'); // 主キーであり、AUTO_INCREMENT属性を持つint型の'id'カラム
            $table->string('view_name', 100); // varchar型の'view_name'カラム
            $table->text('message'); // text型の'message'カラム
            $table->datetime('post_date'); // datetime型の'post_date'カラム
            $table->timestamps(); // timestamp型の'create_at'カラムと'update_at'カラムの省略記法
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
