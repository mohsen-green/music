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
                    ویرایش ژانر
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
        <div class="col-lg-12">
            <div class="card-box">

                    <form action="{{ url('genre') }}" enctype="multipart/form-data"  method="POST">


                    @csrf
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">
                            اطلاعات ژانر
                        </h5>
                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                @isset($genre)

                                    @else
                                    <input name="id" type="hidden" value="0">
                                        @endisset
                                        <label for="product-name">
                                            نام ژانر
                                            <span class="text-danger">
                                                *
                                            </span>
                                        </label>
                                        @isset($genre)
                                        <input class="form-control" id="product-name" name="name" placeholder="" type="text" value="{{ $genre->name }}">
                                            @else
                                            <input class="form-control" id="product-name" name="name" placeholder="" type="text">
                                                @endisset
                                            </input>
                                        </input>
                                    </input>
                                </input>
                            </div>
                            <div class="col-6">
                                <label>
                                    slug
                                </label>
                                @isset($genre)
                                <input class="form-control " name="slug" type="text" value="{{ $genre->slug }}"/>
                                @else
                                <input class="form-control " name="slug" type="text"/>
                                @endisset
                            </div>
                        </div>
                        <input class="form-control border-0" name="file" type="file"/>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="text-center mb-3">
                                    <input class="btn w-sm btn-success waves-effect waves-light" id="save_genre" type="submit" value=" ذخیره">
                                        <button class="btn w-sm btn-danger waves-effect waves-light" type="button">
                                            حذف
                                        </button>
                                    </input>
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
