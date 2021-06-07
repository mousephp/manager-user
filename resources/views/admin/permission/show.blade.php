@extends('admin.layouts.master')
@section('title','Hiển thị permission')
@section('breadcrumb-cate','Permission')
@section('breadcrumb-title','Hiển thị permission')

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
                        <th>display_name</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$permission->id}}</th>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td class="text-center">
                            <a href="{{route('permission.edit',$permission->id)}}" title="Sửa {{$permission->name}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
                        <td title="Xóa {{$permission->name}}">
                            <form action="{{route('permission.destroy',$permission->id)}}" method="post">
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
