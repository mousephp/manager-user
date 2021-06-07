<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'display_name',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

}
