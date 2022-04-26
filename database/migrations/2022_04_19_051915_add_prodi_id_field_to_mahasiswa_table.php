<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdiIdFieldToMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            //untuk table yang namatabels    
            //$table->foreignId("prodi_id")->after("alamat")->constrained()
            //    ->onDelete('cascade')->onUpdate("cascade");

            $table->unsignedBigInteger('prodi_id')->after('alamat');
            $table->foreign('prodi_id')->references('id')->on('prodi')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign("mahasiswa_prodi_id_foreign");
            $table->dropColumn("prodi_id");
        });
    }
}
