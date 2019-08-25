<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kelas',20);
            $table->timestamps();
        });

        //set FK di kolom id_kelas di table students
        Schema::table('students', function(Blueprint $table){
            $table->foreign('id_kelas')
                  ->references('id')
                  ->on('kelas')
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
        //drop FK di id_kelas di table siswa
        Schema::table('students', function(Blueprint $table){
            $table->dropForeign('students_id_kelas_foreign');
        });

        Schema::dropIfExists('kelas');
    }
}
