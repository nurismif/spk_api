<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->unsignedBigInteger('kriteria_ahp_id');
            $table->foreign('kriteria_ahp_id')->references('id')->on('kriteria_ahp')->onUpdate('RESTRICT')->onDelete('CASCADE');

            // $table->unsignedBigInteger('penilaian2_id');
            // $table->foreign('penialain2_id')->references('id')->on('kriteria_wp');

            $table->double('nilai');

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
        Schema::dropIfExists('penilaian');
    }
}
