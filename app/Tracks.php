<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracks extends Model
{
    protected $table = 'tb_tracks';
    protected $primarykey = 'id';
    protected $fillable = ['tracks_name','tracks_file', 'tracks_time', 'album_id'];

     public function album()
    {
    	return $this->belongsTo('App\Album', 'album_id','id');  
    }


     public function Artist()
    {
        return $this->belongsTo('App\artist', 'artist_id', 'id');  
    }

    public function Played()
    {
     return $this->hasMany('App\played','id');  
    }
   
}
