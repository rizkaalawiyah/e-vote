<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaslonRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paslon_rws', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->string('no_paslon');
            $table->string('nm_rw');
            $table->unsignedBigInteger('rw_id');
            $table->foreign('rw_id')->references('id')->on('data_rws')->onDelete('cascade');
            $table->string('pekerjaan');
              $table->string('agama');
                $table->string('umur');
                  $table->string('foto');
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
        Schema::dropIfExists('paslon_rws');
    }
}
