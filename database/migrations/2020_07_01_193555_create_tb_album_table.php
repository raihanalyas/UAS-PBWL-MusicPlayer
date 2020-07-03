<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAlbumTable extends Migration
{
    
    public function up()
    {
        Schema::create('tb_album', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('album_name');
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')
                  ->references('id')->on('tb_artist');
            $table->timestamps();
        });
   
    }
    
    public function down()
    {
        Schema::dropIfExists('tb_album');
    }
}
