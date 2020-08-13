@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">
                    ویرایش هنرمندان
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
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
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card-box">


                <form action="{{url('artist/'.$artists->_id)}}" enctype="multipart/form-data" method="post" multiple="">

                    @csrf
                    <input name="_method" value="PUT" type="hidden">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">
                        اطلاعات هنرمند
                    </h5>
                    <input name="artist_id" value="{{ isset($artists->_id) ? $artists->_id : ''}}" type="hidden">
                    <div class="d-flex">
                        <div class="form-group mb-3 mr-3" style="flex: 1">
                            <label for="product-name">
                                @lang('form.artist_name')
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="product-name" name="name" placeholder="" type="text"
                                value="{{ isset($artists) ? $artists->name : '' }}">
                            </input>
                        </div>
                        <div class="form-group mb-3" style="flex: 1">
                            <label for="exampleFormControlSelect1">
                                @lang('form.artist_sex')
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" name="sex">
                                <option value="مرد">
                                    مرد
                                </option>
                                <option value="زن">
                                    زن
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group mb-3 mr-3" style="flex: 1">
                            <label for="product-name">
                                تصویر
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="product-name" name="img" placeholder="" type="file">
                            </input>
                        </div>
                        <div class="form-group " style="flex: 1">
                            <label for="product-summary">
                                @lang('form.artist_des')
                            </label>
                            <input class="form-control" name="des" placeholder=""
                                value="{{ isset($artists) ? $artists->des : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button class="btn w-sm btn-success waves-effect waves-light" type="submit">
                                    @lang('form.submit')
                                </button>
                                <button class="btn w-sm btn-danger waves-effect waves-light" type="submit">
                                    لغو
                                </button>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </form>
            </div>
            <!-- end card-box -->
        </div>
        <!-- end col -->
        <div class="col-lg-6">
        </div>
        <!-- end col-->
    </div>
    <!-- end row -->
    <!-- end row -->
</div>
<!-- container -->
@endsection

@section('script')
<!-- Summernote js -->
<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js')}}">
</script>
<!-- Select2 js-->
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}">
</script>
<!-- Dropzone file uploads-->
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js')}}">
</script>
<!-- Init js -->
<script src="{{ URL::asset('assets/js/pages/add-product.init.js')}}">
</script>
@endsection
