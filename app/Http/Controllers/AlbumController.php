<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Artist;

class AlbumController extends Controller
{
  
    public function index()
    {
         $rows = Album::paginate(10);
        return view('album.index', compact('rows'));
    }

    public function create()
    {
        $artist = Artist::All();
        return view('album.add', compact('artist'));   
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'album_name'     => 'required',
            'artist_id'      => 'required'
         ]);

        $rows=Album::create([
            'album_name'     => $request->album_name,
            'artist_id'      => $request->artist_id
        ]);
        
        return redirect('album'); 

    }

    public function edit($id)
    {
         $artist = Artist::All();
         $rows = Album::findOrFail($id);
        return view('album.edit', compact('rows','artist'));
    }

    public function update(Request $request, $id)
    {
         $rows = Album::find($id);
         $rows->update([
            'album_name' => $request->album_name,
            'artist_id'  => $request->artist_id   
         ]);

        return redirect('album');
    }

    public function destroy($id)
    {
        
        $rows = ALbum::findOrFail($id);
        $rows->delete();

        return redirect('album');
    
    }
}
