@extends('admin.layouts.master')
@section('title','Sửa role')
@section('breadcrumb-cate','Role')
@section('breadcrumb-title','Sửa role')

@section('content')
@include('admin.layouts.content-header', ['name' => 'role', 'key' => 'edit'])
	<div class="row">
		<div class="col-md-9 offset-md-2">			
			<form class="form-horizontal" action="{{route('role.update',$role->id)}}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group ">
					<label for="example-text-input" class="col-sm-2 col-form-label">Tên vai trò</label>
					<div class="col-sm-8 ">
						<input  class="form-control" type="text" value="{{$role->name}}" name="name" placeholder="Tên vai trò">
						@if ($errors->has('name'))
						<p class="text-danger">{{ $errors->first('name') }}</p>
						@endif
					</div>
				</div>
				<div class="form-group ">
					<label for="example-text-input" class="col-sm-2 col-form-label">Tên hiển thị</label>
					<div class="col-sm-8 ">
						<input  class="form-control" type="text" value="{{$role->display_name}}" name="display_name" placeholder="Tên hiển thị">
						@if ($errors->has('display_name'))
						<p class="text-danger">{{ $errors->first('display_name') }}</p>
						@endif
					</div>
				</div>
				@foreach ($permissions as $permission)
				<div class="form-group">
					<div class="form-check col-sm-8">
						<input type="checkbox" class="form-check-input" name="permission[]" value="{{$permission->id}}" {{$getAllPermissionOfRole->contains($permission->id) ? 'checked' : ''}}>
						<label class="form-check-lable">{{$permission->display_name}}</label>
					</div>
				</div>
				@endforeach 

				<div class="form-group text-center">
					<div class="col-sm-8">	
						<input type="reset" name="" value="Nhập lại"  class="btn btn-lg btn-danger">
						<input type="submit" name="" value="Sửa" class="btn btn-lg btn-success">
					</div>
				</div>							
			</form>
		</div>
	</div>
@endsection


