<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\User;
class GroupUsers extends Model
{
    use HasFactory;
    protected $table = 'groupUsers';
    protected $fillable = [
        'group_id',
        'user_id',
    ];
    public function user()
    {
	    return $this->belongsTo(User::class);
    }
    public function group()
    {
	    return $this->belongsTo(Group::class);
    }
}
