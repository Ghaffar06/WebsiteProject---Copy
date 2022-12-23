<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Playlist;
use App\Models\Song;
class PlaylistSongs extends Model
{
    use HasFactory;
    protected $table = 'playlistSongs';
    protected $fillable = [
        'song_id',
        'playlist_id',
    ];
    
    public function song()
    {
	    return $this->belongsTo(Song::class);
    }
    public function playlist()
    {
	    return $this->belongsTo(Playlist::class);
    }
}

