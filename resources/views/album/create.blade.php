@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
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
                    ویرایش آلبوم
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
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card-box ">

                     <form action="{{url('album')}}" enctype="multipart/form-data" method="post">


    @csrf
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">
                            اطلاعات آلبوم
                        </h5>
                        <div class="d-flex">
                            <div class="form-group mb-3 mr-3 " style="flex: 1">
                                <label for="product-name">
                              @lang('form.album_name')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                @isset ($albumsedite)
  <input class="form-control" id="product-name" name="name" placeholder="" type="text" value="{{ $albumsedite->name }}">
  <input type="hidden" name="id_album" value="{{ $albumsedite->_id}}">
                                    @else
  <input class="form-control" id="product-name" name="name" placeholder="" type="text" value="">
                                </input>
                                @endisset

                            </div>
                            <div class="form-group mb-3" style="flex: 1">
                                <label for="product-name">
                              @lang('form.album_artist')

                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <select class="form-control" name="name_artist" >

                                    @foreach ($artists as $artist)
                                    <option selected="" value=""></option>
                                    <option value="{{$artist->_id}}">
                                        {{ $artist->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fallback">
                            <input multiple="" name="img" type="file"/>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <button class="btn w-sm btn-success waves-effect waves-light" type="submit">
                                   @lang('form.submit')
                                                                        </button>
                                    <button class="btn w-sm btn-danger waves-effect waves-light" type="button">
                                        لغو
                                    </button>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </form>
            </div>
            <!-- end card-box -->
        </div>
        <!-- end col -->
        <div class="">
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
