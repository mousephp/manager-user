@extends('admin.layouts.master')
@section('title','Thêm post')
@section('breadcrumb-cate','Post')

@section('content')
@include('admin.layouts.content-header', ['name' => 'post', 'key' => 'create'])
<div class="row">
    <div class="col-md-9 offset-md-2">
        <form class="form-horizontal" action="{{route('post.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group ">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tên bài viết</label>
                <div class="col-sm-8 ">
                    <input class="form-control" type="text" value="{{old('title')}}" name="title" placeholder="Tiêu đề bài viết">
                    @if ($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <label for="example-text-input" class="col-sm-3 col-form-label">Nội dụng bài viết</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="8" name="content" placeholder="Nhập nội dụng bài viết"></textarea>
                    @if ($errors->has('content'))
                    <p class="text-danger">{{ $errors->first('content') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="example-text-input" class="col-sm-3 col-form-label">Trạng thái</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
                    @if ($errors->has('status'))
                    <p class="text-danger">{{ $errors->first('status') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group text-center">
                <div class="col-sm-8">
                    <input type="reset" name="" value="Nhập lại" class="btn btn-lg btn-danger">
                    <input type="submit" name="" value="Thêm" class="btn btn-lg btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
