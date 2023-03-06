<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianItemOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_item_outlets', function (Blueprint $table) {
            $table->id();
            $table->string('penilaianitemoutlet_name');
            $table->string('penilaianitemoutlet_score');
            $table->string('penilaianitemoutlet_gambar');
            $table->foreignId('itemoutlet_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_item_outlets');
    }
}
