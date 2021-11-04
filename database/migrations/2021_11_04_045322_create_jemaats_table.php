<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('namaLengkap');
            $table->string('kartuVaksin');
            $table->string('nomorWhatsapp');
            $table->string('alamatDomain');
            $table->boolean('verifikasi');
            // $table->unsignedBigInteger('ibadah_id')->unsigned();
            $table->timestamps();
            // $table->foreign('ibadah_id')->references('id')->on('ibadah');
            $table->foreignId('ibadah_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jemaats');
    }
}
