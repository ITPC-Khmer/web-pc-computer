<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index()->nullable();
            $table->string('description')->index()->nullable();
            $table->longText('option')->nullable();

            $table->integer('parent')->index()->nullable()->default(0);
            $table->integer('level')->index()->nullable()->default(0);
            $table->string('hierarchical')->index()->nullable()->default(0);
            $table->string('hierarchical_title')->index()->nullable();

            $table->integer('status')->nullable()->default(1);
            $table->integer('show_in_home')->nullable()->default(1);
            $table->integer('user_id')->index()->nullable()->default(0);
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
        Schema::dropIfExists('post_categories');
    }
}
