<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_siswa')->index();
            $table->unsignedBigInteger('id_hobi')->index();
            $table->timestamps();

            //set PK
            $table->primary(['id_siswa','id_hobi']);

            //set FK hobi_siswa --- siswa
            $table->foreign('id_siswa')
                  ->references('id')->on('students')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            //set FK hobi_siswa --- hobi
            $table->foreign('id_hobi')
                  ->references('id')->on('hobi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_siswa');
    }
}
