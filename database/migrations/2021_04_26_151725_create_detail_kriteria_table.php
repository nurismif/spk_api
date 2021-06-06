<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('kompetensi');

            $table->unsignedBigInteger('kriteria_ahp_id');
            $table->foreign('kriteria_ahp_id')->references('id')->on('kriteria_ahp')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->string('range_nilai');
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
        Schema::dropIfExists('detail_kriteria');
    }
}
