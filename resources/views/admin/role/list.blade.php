@extends('admin.layouts.master')
@section('title','Danh sách role')
@section('breadcrumb-cate','Role')
@section('breadcrumb-title','Danh sách role')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      <a href="{{route('role.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Role</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>name</th>
                        <th>display_name</th>
                        <th colspan="3">Tùy chọn</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Stt</th>
                        <th>name</th>
                        <th>display_name</th>
                        <th colspan="3">Tùy chọn</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($roles as $key => $value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->display_name}}</td>
                        <td class="text-center">
                            <a href="{{route('role.show',$value->id)}}" title="Sửa {{$value->name}}" class="btn btn-success"><i class="fas fa-eye" aria-hidden="true"></i> Hiển thị</a>  
                            <td>
                                <a href="{{route('role.edit',$value->id)}}" title="Sửa {{$value->name}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
                            </td>                          
                            <td  title="Xóa {{$value->name}}" >
                                <form action="{{route('role.destroy',$value->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>
                                </form>
                            </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
