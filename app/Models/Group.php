<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\GroupSongs;
use app\Models\GroupUsers;

class Group extends Model
{
    use HasFactory;
    protected $table = 'group';
    protected $fillable = [
        'name',
    ];
    public function groupSongs()
    {
	    return $this->hasMany(GroupSongs::class);
    }
    public function groupUsers()
    {
	    return $this->hasMany(GroupUsers::class);
    }
}
