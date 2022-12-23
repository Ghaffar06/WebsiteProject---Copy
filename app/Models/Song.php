<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;
use App\Models\Listened;
use App\Models\Type;
use App\Models\PlaylistSongs;
class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = [
        'name',
        'user_id',
        'feature_id',
        'type_id',
    
    ];
    /**
     * Song's foreignKeys
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * song_id foreignKey
     */
    
    public function listeneds()
    {
	    return $this->hasMany(Listened::class);
    }
    public function playlistSongss()
    {
	    return $this->hasMany(PlaylistSongs::class);
    }
    public function groups()
    {
	    return $this->hasMany(Group::class);
    }
}
