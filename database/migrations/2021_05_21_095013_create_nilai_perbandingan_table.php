<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPerbandinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_perbandingan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kriteria_ahp_id');
            $table->foreign('kriteria_ahp_id')->references('id')->on('kriteria_ahp');

            $table->unsignedBigInteger('target_kriteria_ahp_id');
            $table->foreign('target_kriteria_ahp_id')->references('id')->on('kriteria_ahp');

            $table->unsignedBigInteger('nilai_perbandingan');
            $table->foreign('nilai_perbandingan')->references('id')->on('perbandingan');
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
        Schema::dropIfExists('nilai_perbandingan');
    }
}
