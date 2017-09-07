<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_utility_type')->unique();
            $table->string('image_url')->nullable();
            $table->string('status')->nullable()->default(1);
            $table->string('count_view')->nullable()->default(0);
            $table->string('user_id')->index()->nullable()->default(0);
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
        Schema::dropIfExists('image_utilities');
    }
}
