@extends('layouts.master-rtl')



@section('css')
<!-- Plugins css -->

@endsection
<!-- Start Content-->

@section('content')
<div class="mt-3">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

@if (isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
</div>
@endif
<h3 class="mt-2 mb-3 page-title">مدیران</h3>
<div class="card-box">
    <h5 class="container bg-light p-2 text-uppercase">اطلاعات مدیران</h5>
<form method="post" action="{{url('admin/')}}" enctype="multipart/form-data">
    @csrf

<div class="d-flex mt-5">
    <div class="d-flex flex-column flex-grow-1 mr-3">
        <label>نام کاربری <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control mr-3" value="{{old('name')}}">
    </div>
    <div class="d-flex flex-column flex-grow-1">
        <label>ایمیل <span class="text-danger">*</span></label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
    </div>
</div>
<div class="d-flex mt-3">
    <div class="d-flex flex-column mr-3" style="width: 50%">
        <label>رمز عبور  <span class="text-danger">*</span></label>
        <input type="text" name="password" class="form-control " value="{{old('image')}}">
    </div>
    <div class="d-flex flex-column " style="width: 50%">
        <label>نقش <span class="text-danger">*</span></label>
       <select class="form-control" name="role">
         @foreach ($roles as $role)
       <option value="{{$role->id}}">{{$role->name}}</option>
         @endforeach
       </select>

    </div>
</div>
<div class="mt-3">
    <div class="d-flex flex-column">
        <label>عکس</label>
    <input type="file" name="image" value="{{old('image')}}">
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    <input type="submit" value="{{ trans('form.submit') }}" class="btn btn-success mr-2">
    <input type="submit" value="لغو" class="btn btn-danger">

</div>
</form>
</div>
@endsection

@section('script')

@endsection
