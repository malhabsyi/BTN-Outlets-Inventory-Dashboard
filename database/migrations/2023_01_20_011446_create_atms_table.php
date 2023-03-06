<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atms', function (Blueprint $table) {
            $table->id();
            $table->string('atm_name');
            $table->string('atm_location');
            $table->string('atm_deadline_tahun');
            $table->integer('atm_deadline_bulan');
            $table->integer('atm_deadline_tanggal');
            $table->string('atm_note')->nullable();
            $table->string('atm_machine_id');
            $table->string('atm_image');
            $table->string('atm_status');
            $table->string('atm_jenis');
            $table->foreignId('kantor_cabang_id');
            $table->foreignId('outlet_id')->nullable()->references('id')->on('outlet_btns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atms');
    }
}
