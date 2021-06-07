@extends('admin.layouts.master')
@section('title','Hiển thị post')
@section('breadcrumb-cate','post')

@section('content')
@include('admin.layouts.content-header', ['name' => 'post', 'key' => 'show'])
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
                        <th>Title</th>
                        <th>Content</th>
                        <th>User</th>
                        <th>Trạng thái</th>
                        <th colspan="2">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            <div class="form-group clearfix">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($post->status == 1)checked @endif disabled>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{route('post.edit',$post->id)}}" title="Sửa {{$post->title}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
                        <td title="Xóa {{$post->title}}">
                            <form action="{{route('post.destroy',$post->id)}}" method="post">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('exportPdf',$post->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Export pdf</a>
    </div>
</div>
@endsection
