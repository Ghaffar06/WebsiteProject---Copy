<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Song ;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    //
    public function view($number )
    {
        $playlists = Playlist::where('user_id' , Auth::user()->id)->get() ;
        $songs = Song::all()->skip(($number-1) * 20)->take(20);
        
        if(empty($songs))
        {
            return back();
        }
        return view('songs.list' , ['songs' => $songs 
                                    , 'number' => $number 
                                    , 'song' => null 
                                    , 'playlists' => $playlists]) ;
    }
    public function play(Song $song)
    {
        return view('songs.playSong' , ['song' => $song]);
    }

}