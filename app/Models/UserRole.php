<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
	use SoftDeletes;

    protected $table = 'user_role';
    protected $dates = ['deleted_at'];
    
 	protected $fillable = [
        'user_id', 'role_id',
    ];

}
