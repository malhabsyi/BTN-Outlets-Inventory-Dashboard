<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDefaultAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_default_atms', function (Blueprint $table) {
            $table->id();
            $table->string('itemdefaultatm_name');
            $table->string('itemdefaultatm_image');
            $table->foreignId('atm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_default_atms');
    }
}
