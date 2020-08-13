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
    @if(session()->has('message2'))
    <div class="alert alert-danger">
        {{ session()->get('message2') }}
    </div>
    @endif
    @if(session()->has('message3'))
    <div class="alert alert-danger">
        {{ session()->get('message3') }}
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
<h3 class="mt-2 mb-3 page-title">اسلایدر</h3>
<div class="card-box">
    <h5 class="container bg-light p-2 text-uppercase">اطلاعات اسلایدر</h5>
<form action="{{ url('slider/'.$slide->_id) }}" method="POST" enctype="multipart/form-data" class="">
      <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="d-flex mt-3">
        <div class="d-flex flex-column mr-3" style="width: 50%">
            <label>عنوان</label>
        <input type="text" name="title" class="form-control mr-3" value="{{$slide->title}}">
        </div>
        <div class="d-flex flex-column " style="width: 50%">
            <label>وضعیت</label>
            <select class="form-control" name="isactive">
                <option selected></option>
                <option value="1">فعال</option>
                <option value="0">غیرفعال</option>
            </select>
        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="d-flex flex-column mr-3" style="width: 50%">

            <input type="text" class="form-control mr-3 disabled border-1" readonly placeholder="انتخاب موزیک">
        </div>
        <div class="d-flex flex-column " style="width: 50%">

            <select class="form-control" name="music">
                <option selected></option>
                @foreach ($music as $items)
                <option value="{{$items->_id}}">{{$items->name}}</option>

                @endforeach

            </select>

        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="d-flex flex-column mr-3" style="width: 50%">

            <input type="text" class="form-control mr-3 disabled border-1" readonly placeholder="انتخاب البوم">
        </div>
        <div class="d-flex flex-column " style="width: 50%">

            <select class="form-control" name="album">
                <option selected></option>
                @foreach ($album as $items)
                <option value="{{$items->_id}}">{{$items->name}}</option>

                @endforeach
            </select>

        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="d-flex flex-column mr-3" style="width: 50%">

            <input type="text" class="form-control mr-3 disabled border-1" readonly placeholder="انتخاب هنرمند">
        </div>
        <div class="d-flex flex-column " style="width: 50%">

            <select class="form-control" name="artist">
                <option selected></option>
                @foreach ($music as $items)
                <option value="{{$items->_id}}">{{$items->name}}</option>

                @endforeach
            </select>

        </div>
    </div>


    <div class="d-flex mt-2">
        <div class="d-flex flex-column mr-3  " style="width: 50%">

            <input type="text" class="form-control mr-3 disabled border-1" readonly placeholder=" ساخت لینک   ">
        </div>
        <div class="d-flex flex-column " style="width: 50%">

            <input type="text" name="link" class="form-control mr-3" value="{{$slide->link}}">

        </div>
    </div>


    <div class="d-flex flex-column mt-2" style="width: 50%">
        <label>عکس</label>
        <input type="file" name="image" value="" class="form-control mt-1 border-0" style="">
    </div>

    <div class="d-flex justify-content-center mt-4">
        <input type="submit" value="{{ trans('form.submit') }}" class="btn btn-success mr-2">
        <input type="button" value="لغو" class="btn btn-danger">
    </div>
</form>
</div>
@endsection

@section('script')

@endsection
