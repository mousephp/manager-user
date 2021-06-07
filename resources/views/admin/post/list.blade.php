@extends('admin.layouts.master')
@section('title','Danh sách post')
@section('breadcrumb-cate','Post')

@section('content')
@include('admin.layouts.content-header', ['name' => 'post', 'key' => 'list'])
<div class="form-group ">
    <label class=" col-form-label">Chọn</label>
    <label class="btn btn-danger"><input type="checkbox" id="checkAll"> Checked All</label>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        <a href="{{route('post.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Post</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>checkbox</th>
                        <th>Stt</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>User</th>
                        <th>Trạng thái</th>
                        <th colspan="3">Tùy chọn</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>checkbox</th>
                        <th>Stt</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>User</th>
                        <th>Trạng thái</th>
                        <th colspan="3">Tùy chọn</th>
                    </tr>
                </tfoot>
                <tbody>
                    <form action="{{route('del-post-multiple')}}" method="GET" id="insert_from">
                        @csrf
                        <a href="{{url('admin/del-post-multiple')}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <input type="submit" name="submit" class="btn btn-danger" value="Delete All Data" />
                        </a>
                        @foreach($posts as $key => $value)
                        <tr>
                            <td class="checkbox">
                                <label><input type="checkbox" value="{{$value->id}}" name="checked[]" title="{{$value->id}}" class="checkCate"></label>
                            </td>
                            <td>{{++$key}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->content}}</td>
                            <td><span class="badge badge-dark">{{$value->user->name}}</span></td>
                            <td>
                                <div class="form-group clearfix">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" @if($value->status == 1)checked @endif disabled>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('post.show',$value->id)}}" title="Sửa {{$value->title}}" class="btn btn-success"><i class="fas fa-eye" aria-hidden="true"></i> Hiển thị</a>
                            <td class="text-center">
                                <a href="{{route('post.edit',$value->id)}}" title="Sửa {{$value->title}}" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
                            </td>
                            <td title="Xóa {{$value->title}}">
                                {{-- <form action="{{route('post.destroy',$value->id)}}" method="post">
                                @csrf
                                @method('DELETE') --}}

                                <button type="submit" class="btn btn-danger"><a style="color: inherit;" href="{{url('admin/del-post/'.$value->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>
                                {{-- </form> --}}
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        {{ $posts->onEachSide(5)->links() }}
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('exportExcel')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Export excel</a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    //checked hết các bản ghi
    $('#checkAll').click(function() {
        $(':checkbox.checkCate').prop('checked', this.checked);
    });

</script>
@endsection
