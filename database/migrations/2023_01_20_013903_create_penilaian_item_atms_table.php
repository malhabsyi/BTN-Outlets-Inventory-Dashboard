<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianItemAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_item_atms', function (Blueprint $table) {
            $table->id();
            $table->string('penilaianitematm_name');
            $table->string('indikator');
            $table->string('penilaianitematm_score');
            $table->string('penilaianitematm_gambar');
            $table->foreignId('itematm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_item_atms');
    }
}
