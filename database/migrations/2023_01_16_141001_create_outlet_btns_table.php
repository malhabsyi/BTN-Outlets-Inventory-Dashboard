<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletBtnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlet_btns', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_name');
            $table->string('outlet_location');
            $table->string('outlet_sbh');
            $table->integer('outlet_deadline_tahun');
            $table->integer('outlet_deadline_bulan');
            $table->integer('outlet_deadline_tanggal');
            $table->string('outlet_note');
            $table->string('outlet_status');
            $table->foreignId('kantor_cabang_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outletbtns');
    }
}
