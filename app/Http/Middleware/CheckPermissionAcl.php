<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Permission;
use App\User;
use Auth;
use DB;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission=null)
    {
        //1. lay ra tat ca cac role cua user login va he thong
        $listRoleOfUser = User::find(auth()->id())->role()->select('roles.id')->pluck('id')->toArray();
        //dd($listRoleOfUser);

        //2:lay ra tat ca cac quyen cua user login vao he thong
        $listPermissionOfUser = DB::table('roles')
        ->join('role_permission','roles.id','=','role_permission.role_id')
        ->join('permissions','role_permission.permission_id','=','permissions.id')
        ->whereIn('roles.id', $listRoleOfUser)
        ->select('permissions.*')
        ->get()->pluck('id')->unique();
        // dd($listPermissionOfUser);

        //3. lay ra ma man hinh tuong ung de check phan quyen
        $checkPermission = Permission::where('name',$permission)->value('id');

        //4. kiem tra user duoc phep vao man hinh nay khong
        if($listPermissionOfUser->contains($checkPermission)){
            return $next($request);
        }
        return abort(403);
    }
}
