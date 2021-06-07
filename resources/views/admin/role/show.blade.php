@extends('admin.layouts.master')
@section('title','Hiển thị role')
@section('breadcrumb-cate','Role')
@section('breadcrumb-title','Hiển thị role')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          	<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
	            <thead>
					<tr>
					 <th>Stt</th>
                        <th>name</th>
                        <th>permission</th>
                        <th>display_name</th>
                        <th colspan="2">Tùy chọn</th>
					</tr>
	            </thead>
				<tbody>
					<tr>
						<th scope="row">{{$role->id}}</th>
						<td>{{$role->name}}</td>
                        <td>
							@foreach ($permissions as $permission)
									@if($getAllPermissionOfRole->contains($permission->id))
										@if($role->name == 'admin')
											<span></span>
										@else
											<span class="badge badge-info">{{$permission->name}}</span>	
										@endif
									@endif
							@endforeach 
							@if($role->name == 'admin')
								<span class="badge badge-danger">Admin</span>
							@endif
						</td>
                        <td>{{$role->display_name}}</td>
						<td class="text-center">
							<a href="{{route('role.edit',$role->id)}}" title="Sửa {{$role->name}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
							<td title="Xóa {{$role->name}}">
								<form action="{{route('role.destroy',$role->id)}}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>
								</form>
							</td>
						</td>
					</tr>
				</tbody>
     		</table>
	    </div>
	</div>	 
</div>
@endsection
