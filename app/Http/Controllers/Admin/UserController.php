<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\SetPasswordIdRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\RoleRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\UserRole;
use Auth;
use Log;
use Exception;
use DB;
use Hash;

class UserController extends Controller
{
    protected $user;
    protected $role;
    
    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role){
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->name;
        if (Gate::forUser($user)->allows('user-create')) {
            $roles = $this->role->all();
            return view('admin.user.create',compact('roles'));
        } else {
            abort(403);
        }         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->role()->attach($request->roles);
            DB::commit();
            return redirect()->back()->withInput($request->input())->with('message','Thêm thành công');
        } catch (Exception $exception) {
            DB::rollBack();
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
        $user = $this->user->find($id);
        if (Gate::forUser($user)->allows('user-view', $user)) {
            return view('admin.user.show',compact('user'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        if (Gate::forUser($user)->allows('user-edit', $user)) {
            $roles          = $this->role->all();
            $listRoleOfUser = DB::table('user_role')->where('user_id',$id)->pluck('role_id');
            return view('admin.user.edit',compact('roles','user','listRoleOfUser'));
        } else {
            abort(403);
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            //attach
            $user   = $this->user->find($id);
            $result = $this->user->update($id,[
                'name'  => $request->name,
                'email' => $request->email        
            ]);
            DB::table('user_role')->where('user_id',$id)->delete();
            $user->role()->attach($request->roles);           
            DB::commit();

            //change password follow id
            $data = $request->all(); 
            if(!\Hash::check($data['user_password'], $user->password)){
                return redirect()->back()->withInput($request->input())->with('error','Bạn đã nhập sai mật khẩu cũ');
            }else{
                $this->user->update($id,['password'=> Hash::make($request->user_password_new)]);
            } 
            return redirect()->route('user.index')->with('message','Cập nhâp tài khoản thành công');  
        } catch (Exception $exception) {
            DB::rollBack();
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
        $user = $this->user->find($id);
        if (Gate::forUser($user)->allows('user-delete', $user)) {
            try {             
                DB::beginTransaction();
                $user->delete($id);
                $user->role()->detach();
                DB::commit();
                return redirect()->route('user.index')->with('message','Xóa tài khoản thành công');             
            } catch (Exception $exception) {
                DB::rollBack();
                Log::error('error(loi):'.$exception->getMessage() .$exception->getLine());
            }        
        }else {
            abort(403);
        }  
    }

    public function getUpdatePasswordId()
    {
        return view('admin.user.update-password');
    }

    public function postUpdatePasswordId(SetPasswordIdRequest $request)
    {
        $data = $request->all(); 
        $user = $this->user->find(auth()->user()->id);
        if(!\Hash::check($data['user_password'], $user->password)){
            return redirect()->back()->with('error','Bạn đã nhập sai mật khẩu cũ');
        }else{          
            $this->user->updateId($user->id,[
                'password'=> bcrypt($request->user_password_new)
            ]);
            return redirect()->back()->with('message','Cập nhâp mật khẩu thành công'); 
        }
    }
    
}












    // public function create()
    // {
    //     //sử dụng gate làm thủ công
    //     // if (Gate::forUser($user)->allows('user-create')) {
    //     // } else {
    //         // abort(403);
    //     // }  

    //     //trường hợp sử dụng acl làm tự động 
    //     $user = Auth::user()->name;
    //     $roles = $this->role->all();
    //     return view('admin.user.create',compact('roles'));   
    // }
    // */
    // public function show($id)
    // {
    //     //gate
    //     // if (Gate::forUser($user)->allows('user-view', $user)) {
    //     // } else {
    //     //     abort(403);
    //     // }

    //     //acl
    //     $user = $this->user->find($id);
    //     return view('admin.user.show',compact('user'));
    // }

    // public function edit($id)
    // {
    //     //gate
    //     // if (Gate::forUser($user)->allows('user-edit', $user)) {
    //     // } else {
    //     //     abort(403);
    //     // }

    //     //policy
    //     $user           = $this->user->find($id);
    //     $roles          = $this->role->all();
    //     $listRoleOfUser = DB::table('user_role')->where('user_id',$id)->pluck('role_id');
    //     return view('admin.user.edit',compact('roles','user','listRoleOfUser'));  
    // }

    // public function destroy($id)
    // {
    //     //gate
    //     // if (Gate::forUser($user)->allows('user-delete', $user)) {
    //     // }else {
    //     //     abort(403);
    //     // }  

    //     try {             
    //         DB::beginTransaction();
    //         $user = $this->user->find($id);
    //         $user->delete($id);
    //         $user->role()->detach();
    //         DB::commit();
    //         return redirect()->route('user.index')->with('message','Xóa tài khoản thành công');
    //     } catch (Exception $exception) {
    //         DB::rollBack();
    //         Log::error('error(loi):'.$exception->getMessage() .$exception->getLine());
    //     }   
    // }