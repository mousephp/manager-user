<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Str;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Models\Post;
use Auth;
use Log;
use Exception;
use PDF;

use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    protected $post;
    protected $user;

    public function __construct(PostRepositoryInterface $post, UserRepositoryInterface $user){
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(5);
        return view('admin.post.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $users = $this->user->all();
        return view('admin.post.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        try {
            $post = $this->post->create([
                'title'   => $request->title,
                'content' => $request->content,
                'status'  => $request->status,
                'user_id' => Auth::user()->id 
            ]);
            return redirect()->back()->with(['message' => 'Thêm thành công']);
        } catch (Exception $exception) {
            Log::error('error(loi):'.$exception->getMessage() .$exception->getLine());
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post  = $this->post->find($id);
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $post  = $this->post->find($id);
        $this->authorize('update', $post);
        $users = $this->user->all();
        return view('admin.post.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        try {
            $post = $this->post->update($id,[
                'title'   => $request->title,
                'content' => $request->content,
                'status'  => $request->status,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('post.index')->with(['message' => 'Sửa thành công']);
        } catch (Exception $exception) {
            Log::error('error(loi):'.$exception->getMessage() .$exception->getLine());
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postId = $this->post->find($id);
        $this->authorize('delete', $postId);
        $delete = $this->post->delete($id);
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }

    public function deleteMultiple(Request $request){
        $user = Auth::user()->name;
        if (!Gate::forUser($user)->allows('user-delete-all', $user)) {
            abort(403);
        }
        if(empty($request->checked)){
            return redirect()->back()->with('error','Không có bản ghi nào được chọn');
        }
        $multiple = $this->post->deleteMultiple($request->checked);
        if($multiple){
            return redirect()->back()->with('message','Xóa multiple thành công');
        }
        return redirect()->back()->with('error','Xóa multiple thất bại');        
    }

    // Generate PDF
    public function exportPDF($id) {
      // retreive all records from db
      $data = $this->post->find($id);

      // share data to view
      $pdf = PDF::loadView('admin.post.pdf',compact('data'));

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }


    //export excel
    public function exportExcel() 
    {
        return Excel::download(new PostExport, 'posts.xlsx');
    }

}
