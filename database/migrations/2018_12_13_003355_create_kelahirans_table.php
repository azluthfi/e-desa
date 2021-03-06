<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahiran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->string('nama')->nullable();
            $table->string('tempat')->nullable();
            $table->integer('anak_ke')->default(0);
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('file')->nullable();
            $table->integer('persetujuan')->default(0);
            $table->timestamps();

            $table->foreign('penduduk_id')
                ->references('id')
                ->on('penduduk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelahiran');
    }
}
