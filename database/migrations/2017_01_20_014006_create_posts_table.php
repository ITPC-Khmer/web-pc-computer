<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('option')->nullable();
            $table->text('video_url')->nullable();
            $table->text('image_url')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->integer('user_id')->nullable();
            $table->integer('view_count')->nullable();
            $table->timestamps();

            //$table->index(['title', 'description','image_url']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
