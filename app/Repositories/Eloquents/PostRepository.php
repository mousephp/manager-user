<?php 

namespace App\Repositories\Eloquents;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
		parent::__construct($post);
	}

	public function deleteMultiple($attributes){      
        $result = $this->find($attributes);
        if ($result) {
            foreach ($attributes as $id) {
                $this->post->where("id",$id)->delete(); 
            }
            return true;
        }
        return false;       
    }

    public function user(){   
        return $this->post->with('user')->get();
    }
    
}




