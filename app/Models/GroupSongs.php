<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Song;
class GroupSongs extends Model
{
    use HasFactory;
    protected $table = 'groupSongs';
    protected $fillable = [
        'group_id',
        'song_id',
    ];
    public function song()
    {
	    return $this->belongsTo(Song::class);
    }
    public function group()
    {
	    return $this->belongsTo(Group::class);
    }
}
