<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianDefaultOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_default_outlets', function (Blueprint $table) {
            $table->id();
            $table->string('penilaiandefaultoutlet_name');
            $table->string('penilaiandefaultoutlet_indikator');
            $table->string('penilaiandefaultoutlet_score');
            $table->string('penilaiandefaultoutlet_gambar');
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
        Schema::dropIfExists('penilaian_default_outlets');
    }
}
