<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->string('alamat_pergi')->nullable();
            $table->string('alamat_datang')->nullable();
            $table->string('status_mutasi')->nullable();
            $table->string('alasan')->nullable();
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
        Schema::dropIfExists('mutasi');
    }
}
