<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('about')->nullable();
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->longText('option')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('slide_products');
    }
}
