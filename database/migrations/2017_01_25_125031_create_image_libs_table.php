<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageLibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_libs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_lib_type');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('video_url')->nullable();
            $table->text('image_url')->nullable();
            $table->integer('user_create_id')->nullable();
            $table->integer('view_count')->nullable();
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
        Schema::dropIfExists('image_libs');
    }
}
