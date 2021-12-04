<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgapesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agapes', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_ibadah');
            $table->date('tanggal_ibadah');
            $table->string('jam_ibadah');
            $table->string('kuota');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agapes');
    }
}
