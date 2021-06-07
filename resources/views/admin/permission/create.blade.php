@extends('admin.layouts.master')
@section('title','Thêm permission')
@section('breadcrumb-cate','Permission')
@section('breadcrumb-title','Thêm permission')

@section('content')
@include('admin.layouts.content-header', ['name' => 'permission', 'key' => 'create'])
<div class="row">
    <div class="col-md-9 offset-md-2">
        <form class="form-horizontal" action="{{route('permission.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group ">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tên permission</label>
                <div class="col-sm-8 ">
                    <input class="form-control" type="text" value="{{old('name')}}" name="name" placeholder="Nhập tên permission">
                    @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tên hiển thị</label>
                <div class="col-sm-8 ">
                    <input class="form-control" type="text" value="{{old('display_name')}}" name="display_name" placeholder="Nhập tên hiển thị">
                    @if ($errors->has('display_name'))
                    <p class="text-danger">{{ $errors->first('display_name') }}</p>
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
