<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTracksTable extends Migration
{
   
    public function up()
    {
        Schema::create('tb_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tracks_name');
             $table->string('tracks_file')->nullable();
              $table->string('tracks_time');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')
                  ->references('id')->on('tb_album');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('tb_tracks');
    }
}
