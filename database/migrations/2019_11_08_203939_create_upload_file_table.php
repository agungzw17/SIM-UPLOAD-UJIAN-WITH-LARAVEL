<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_file', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mata_kuliah_id');
            $table->integer('jenis_ulangan_id');
            $table->date('tanggal_ujian');
            $table->time('jam_mulai_ujian');
            $table->time('jam_selesai_ujian');
            $table->string('durasi_ujian');
            $table->integer('total_ujian');
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
        Schema::dropIfExists('upload_file');
    }
}
