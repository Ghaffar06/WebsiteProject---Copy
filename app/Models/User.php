<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Region;
use App\Models\Listened;
use App\Models\UserPlaylist;
use App\Models\Song;
use App\Models\GroupUser;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users' ;
    protected $fillable = [
        'name',
        'email',
        'username',
        'role_id',
        'password',
        'region_id',
        'birthdate',
        'about' ,

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User's foreignKeys
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * user_id foreignKey
     */

    public function listeneds()
    {
	    return $this->hasMany(Listened::class);
    }
    public function songs()
    {
	    return $this->hasMany(Song::class);
    }
    public function groups()
    {
	    return $this->belongsToMany(Group::class);
    }
    public function playlists()
    {
	    return $this->hasMany(Playlist::class);
    }
}
