<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Permission;
use app\Models\User;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'permission_id',
        'name',        
    ];
    public function permissions()
    {
	    return $this->belongsTo(Permission::class);
    }
    public function user()
    {
	    return $this->hasOne(User::class);
    }
}
