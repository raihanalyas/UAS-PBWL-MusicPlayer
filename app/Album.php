<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'tb_album';
    protected $primarykey = 'id';
    protected $fillable = ['album_name', 'artist_id'];


      public function Artist()
    {
     return $this->belongsTo('App\Artist', 'artist_id','id');  
    }

    public function Tracks()
    {
     return $this->hasMany('App\Tracks', 'id');  
    }
}


