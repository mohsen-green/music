@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/jquery-nice-select/jquery-nice-select.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/multiselect/multiselect.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css"/>
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
                    ویرایش  کانال
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
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">

            <form action="{{url('channel')}}" enctype="multipart/form-data" method="post">
                <input name="_method" type="hidden" value="PUT"">

                @csrf
                    <input name="channelid" type="hidden" value="{{ isset($channel) ? $channel->_id : '' }}">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">
                                اطلاعات کانال
                            </h5>
                            <div class="d-flex">
                                <div class="form-group mb-3 mr-3" style="flex: 1">
                                    <label for="product-name">
                                          @lang('form.channel_name')
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control" id="product-name" name="name" placeholder="" type="text" value="{{ isset($channel) ? $channel->name : '' }}">
                                    </input>
                                </div>
                                <div class="form-group mb-3 " style="flex: 1">
                                    <label for="product-name">
                                       @lang('form.channel_data')
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control" id="product-name" name="data" placeholder="" type="date" value="{{ isset($channel) ? $channel->data : '' }}">
                                    </input>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mb-3 mr-3" style="flex: 1">
                                    <label for="product-name">
                                          @lang('form.channel_des')
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control" id="product-name" name="des" placeholder="" type="text" value="{{ isset($channel) ? $channel->description : '' }}">
                                    </input>
                                </div>
                                <div class="mb-3 " style="flex: 1">
                                    <label for="product-name">
                                                 @lang('form.channel_music')
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <select class="form-control select2-multiple" data-placeholder="Choose ..." data-toggle="select2" multiple="multiple" name="music[]">
                                        @isset ($list_music)

                                                     @foreach ($list_music as $list)
                                                            <option value="{{ $list->_id }}" selected>
                                                                {{ $list->name }}
                                                            </option>
                                                            @endforeach
                                         @endisset





                                                        @foreach ($musics as $music)
                                                            <option value="{{ $music->_id }}">
                                                                {{ $music->name }}
                                                            </option>
                                                            @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- end card-->
                            <div class="form-group mb-3 mr-3" style="flex: 1">
                                <label for="product-name">
                                    کاور
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <input class="form-control border-0" id="product-name" name="img" placeholder="" type="file">
                                </input>
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
                        </div>
                        <!-- end col-->
                    </input>
                </form>
            </form>
        </div>
        <!-- end row-->
    </div>
</div>
<!-- end card-box -->
<!-- end col -->
<div class="col-lg-6">
</div>
<!-- end row -->
<!-- end row -->
<!-- container -->
@endsection

@section('script')
<!-- Init js-->
<script src="{{ URL::asset('assets/libs/jquery-nice-select/jquery-nice-select.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/switchery/switchery.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/multiselect/multiselect.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/jquery-mockjax/jquery-mockjax.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/autocomplete/autocomplete.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/bootstrap-select/bootstrap-select.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}">
</script>
<script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}">
</script>
<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}">
</script>
@endsection
