<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('key')->unique()->index()->nullable();
            $table->string('title')->unique()->index()->nullable();
            $table->text('key_value')->nullable();
            $table->string('key_type')->index()->nullable();// text,select,file,...
            $table->text('select_value')->nullable(); //if  key_type = select

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
        Schema::dropIfExists('web_settings');
    }
}
