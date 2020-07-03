<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracks;
use App\Artist;
use App\Album;

class TracksController extends Controller
{
    
    public function index()
    {
        $rows = Tracks::paginate(10);
        return view('tracks.index', compact('rows'));
    }

      public function create()
    {
        $album = Album::all();
        return view('tracks.add', compact('album'));
    }

    public function store(Request $request)
    {
        
        $rows = new Tracks();
        $rows->tracks_name = $request->input('tracks_name');
        $rows->tracks_time = $request->input('tracks_time');
        $rows->album_id     = $request->input('album_id');

        if ($request->hasFile('tracks_file')) {
            $tracks_file = $request->file('tracks_file');
            $extension = $tracks_file->getClientOriginalName();
            $filename =  $extension;
            $tracks_file->move('public/uploads/tracks/', $filename);
            $rows->tracks_file = $filename;
        }
            $rows->save();
            return redirect('tracks');
          
    }
    
     public function edit($id)
    {
         $album = Album::all();
         $rows = Tracks::findOrFail($id);
        return view('tracks.edit', compact('rows','album'));
    }

    public function update(Request $request, $id)
    {
        $rows = Tracks::find($id);
        $rows->tracks_name = $request->input('tracks_name');
        $rows->tracks_time = $request->input('tracks_time');
        $rows->album_id     = $request->input('album_id');

         if ($request->hasFile('tracks_file')) {
            $tracks_file = $request->file('tracks_file');
            $extension = $tracks_file->getClientOriginalName();
            $filename =  $extension;
            $tracks_file->move('public/uploads/tracks/', $filename);
            $rows->tracks_file = $filename;
        }

            $rows->save();
            return redirect('tracks');
    }

    public function destroy($id)
    {
        $rows = Tracks::findOrFail($id);
        $rows->delete();

        return redirect('photo');

    }
}
