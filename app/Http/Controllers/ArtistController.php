<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;


class ArtistController extends Controller
{
   
    public function index()
    {
        $rows = Artist::All();
        return view('artist.index', compact('rows'));
    }

    public function create()
    {
        return view('artist.add');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'bail|required:tb_artist'
        ],
        [
            'artist_name.required' => 'Isi Nama !'
       ]);

       Artist::create([
            'artist_name' => $request->artist_name
       ]);

       return redirect('artist'); 
    }


    public function edit($id)
    {
        
        $rows = Artist::findOrFail($id);
        return view('artist.edit', compact('rows'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'artist_name' => 'bail|required:tb_artist'
        ],
        [
        
        'artist_name.required' => 'Isi Nama !'
        ]);

        $rows = Artist::findOrFail($id);
        $rows->update([
            'artist_name' => $request->artist_name
        ]);

        return redirect('artist');
    }

    public function destroy($id)
    {
        $rows = Artist::findOrFail($id);
        $rows->delete();
    }
}
