<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaslonRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paslonrts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_paslon');
            $table->string('nm_rt');
            $table->unsignedBigInteger('rt_id');
          $table->foreign('rt_id')->references('id')->on('data_rts')->onDelete('cascade');
            $table->string('pekerjaan');
              $table->string('agama');
                $table->string('umur');
                  $table->string('gambar');
                              $table->bigInteger('votes')->default(0);   
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
        Schema::dropIfExists('paslonrts');
    }
}
