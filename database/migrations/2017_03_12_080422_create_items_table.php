<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->index()->nullable();
            $table->integer('count_sale')->index()->default(0)->nullable();
            $table->string('item_code')->index();
            $table->string('title')->index()->nullable();
            $table->integer('instock')->default(1);
            $table->integer('condition')->default(1);
            $table->string('description')->index()->nullable();
            $table->longText('image_url')->nullable();
            $table->longText('specifics')->nullable();
            $table->longText('details')->nullable();
            $table->longText('content')->nullable();
            $table->float('start_price')->nullable();//json
            $table->float('promotion_price')->nullable()->default(0);//json
            $table->integer('items_per_lot')->default(1);
            $table->string('duration')->index()->nullable();
            $table->integer('private_listing')->default(1);
            $table->longText('return_policy')->nullable();
            $table->longText('option')->nullable();
            $table->integer('status')->default(1);
            $table->integer('user_id')->index()->nullable();
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
        Schema::dropIfExists('items');
    }
}
