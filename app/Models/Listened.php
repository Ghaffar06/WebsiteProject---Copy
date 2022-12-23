<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Song;
class Listened extends Model
{
    use HasFactory;
    protected $table = 'listened';
    protected $fillable = [
        'user_id',
        'song_id',
        'rating',
        

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
