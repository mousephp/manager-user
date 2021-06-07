<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\EditPermissionRequest;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Log;
use Exception;
use DB;

class PermissionController extends Controller
{
    protected $permission;
    
    public function __construct(PermissionRepositoryInterface $permission){
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->all();
        return view('admin.permission.list', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPermissionRequest $request)
    {
        try {
            $permission = $this->permission->create([
                'name'         => $request->name,
                'display_name' => $request->display_name
            ]);
            return redirect()->back()->withInput($request->input())->with('message','Thêm thành công');
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
        $permission = $this->permission->find($id);
        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permission->find($id);
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPermissionRequest $request, $id)
    {
        try {
            $permission = $this->permission->update($id,[
                'name'         => $request->name,
                'display_name' => $request->display_name
            ]);
            return redirect()->route('permission.index')->with('message','Sửa thành công');
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
        $this->permission->delete($id);
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
