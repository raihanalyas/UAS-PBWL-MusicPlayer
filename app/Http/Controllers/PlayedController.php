<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Played;
use App\Tracks;
use App\Artist;
use App\Album;

class PlayedController extends Controller
{
    
    public function index()
    {
        $rows = Played::paginate(10);
        return view('played.index', compact('rows'));
    }

    
    public function create()
    {
        $tracks = Tracks::All();
        return view('played.add', compact('tracks')); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tracks_id'      => 'required'
         ]);

        $rows=Played::create([
            'tracks_id'      => $request->tracks_id
        ]);
        
        return redirect('played'); 
    }

    public function edit($id)
    {
        $tracks = Tracks::All();
         $rows = Played::findOrFail($id);
        return view('played.edit', compact('rows','tracks'));
    }

    public function update(Request $request, $id)
    {
        $rows = Played::find($id);
         $rows->update([
            'tracks_id'  => $request->tracks_id   
         ]);

        return redirect('played');
    }

   
    public function destroy($id)
    {
        $rows = Played::findOrFail($id);
        $rows->delete();

        return redirect('played');
    }
}
