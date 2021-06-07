<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Post extends Model
{	
	use SoftDeletes;

    protected $table 	= 'posts';
    protected $dates 	= ['deleted_at'];
    protected $fillable = [
        'title','content','status','user_id'
    ];

    public function user(){
		  return $this->belongsTo(User::class);
    }
}
