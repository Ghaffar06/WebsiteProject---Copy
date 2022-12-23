<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Song;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $fillable = [
        'name',
    ];

    public function songs()
    {
	    return $this->hasMany(Song::class);
    }
}
