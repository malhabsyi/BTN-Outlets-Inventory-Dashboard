<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDefaultOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_default_outlets', function (Blueprint $table) {
            $table->id();
            $table->string('itemdefaultoutlet_name');
            $table->string('itemdefaultoutlet_image');
            $table->foreignId('outlet_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_default_outlets');
    }
}
