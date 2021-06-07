<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{	
	use SoftDeletes;

    protected $table = 'permissions';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'display_name',
    ];

    public function roles(){
        // return $this->belongsToMany(Role::class);
    }

}
