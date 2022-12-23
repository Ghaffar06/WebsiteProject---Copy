<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Song ;


class SearchController extends Controller
{
    public function find()
    {	
        $message = "Type to search!" ;
        return view('welcome' , ['message' => $message] );			
    }		
    public function searchSongs(Request $request , $number = 1)
    {			
        $playlists = Playlist::where('user_id' , $request->user()->id)->get() ;
        
        $search = $request->search;		
        $result = Song::query()->where('name', 'LIKE', "%{$search}%")
            ->get()
            ->skip(($number-1) * 20)
            ->take(20);        

        if (count ( $result ) >  0)
            return view('songs.list' , ['songs' => $result 
                                        , 'number' => $number 
                                        , 'song' => null 
                                        , 'search' => $search
                                        , 'playlists' => $playlists]) ;

        return view('songs.list' , ['songs' => null 
                                    , 'number' => 1
                                    , 'song' => null  
                                    , 'message' => 'No results for search key: '.$search.' !'
                                    , 'playlists' => $playlists]) ;

        
        
    }
}