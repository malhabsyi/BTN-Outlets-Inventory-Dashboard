<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianDefaultAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_default_atms', function (Blueprint $table) {
            $table->id();
            $table->string('penilaiandefaultatm_name');
            $table->string('penilaiandefaultatm_indikator');
            $table->string('penilaiandefaultatm_score');
            $table->string('penilaiandefaultatm_gambar');
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
        Schema::dropIfExists('penilaian_default_atms');
    }
}
