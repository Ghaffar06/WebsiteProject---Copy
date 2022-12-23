<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\PlaylistSongs;
use App\Models\User;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    //
    public function play( $playlist)    
    {
        if(Playlist::findOrFail($playlist)->user_id != Auth::user()->id)
            return back()->with('error' , 'You have no access!') ;

        $playlistSongs = PlaylistSongs::where('playlist_id' , $playlist)->get() ;
        return  view('playlists.playlist' , ['playlistSongs' => $playlistSongs]) ;
    }
    public function create(Request $request)
    {
        $playlist = new Playlist ;
        $playlist->name = $request->name ;
        $user = new User ;
        $user = User::findOrFail($request->user()->id);
        $user->playlists()->save($playlist) ;
        return back()->with('success' , 'added successfully'); ;   
    }
    public function view()
    {
        $playlists = Playlist::where('user_id' , Auth::user()->id)->get() ;
        return view('user.playlists' , ['playlists' => $playlists]) ;
    }
    public function add(Request $request)
    {
        $playlists = $request->playlists ;
        $song = new Song ;
        $song = Song::findOrFail($request -> song) ;
        $flag = false ; // repeate flag
        foreach ($playlists as $playlistId)
        {
            
            $playlistSong = new PlaylistSongs ;
            $playlistSong->playlist_id = $playlistId ;

            $queryValidation = PlaylistSongs::where('playlist_id' , $playlistId)
            ->where('song_id' , $song->id)->get() ;

            if(count($queryValidation) ){
                $flag = true ;
            }
             else $song->playlistSongss()->save($playlistSong) ;
        }
        if($flag == false)
            return back()->with('success' , 'added successfully');
        else
            return back()->with('success' , 'added successfully, But some are already exist!');

    }
    public function viewForm()
    {
        return view('playlists.create') ;
    }
    
}