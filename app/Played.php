<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
    protected $table = 'tb_played';
    protected $primarykey = 'id';
    protected $fillable = ['tracks_id'];

     public function Tracks()
    {
     return $this->belongsTo('App\Tracks', 'tracks_id','id');  
    }
}
