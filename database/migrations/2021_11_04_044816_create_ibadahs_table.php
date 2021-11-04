<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbadahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibadahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaIbadah');
            $table->string('imageIbadah');
            $table->integer('quota');
            $table->string('jam');
            $table->date('tanggal');
            $table->string('deskripsi');
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
        Schema::drop('ibadahs');
    }
}
