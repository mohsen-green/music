@extends('layouts.master-rtl')

@section('content')

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('assets/libs/jquery-nice-select/jquery-nice-select.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/libs/multiselect/multiselect.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">آلبوم ها</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <form class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2"
                                           placeholder="Search...">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>کاور</th>
                                <th>عنوان آلبوم</th>


                                <th> تاریخ ثبت</th>
                                <th>تاریخ اخرین ویرایش</th>

                                <th style="width: 82px;">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach ($albums as $album)
                            <tr>



                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src=" {{ url($urlstorge.$album->coverImage) }} " alt="table-user"
                                         class="mr-2 rounded-circle">

                                </td>
                                <td>
                                    {{ $album->name }}
                                </td>

                                <td>
                                    {{  $album->created_at}}
                                </td>
                                <td>
                                    {{ $album->updated_at }}
                                </td>


                                <td>
                                    <a href="{{   url('album/'.$album->_id.'/edit' ) }}" class="action-icon"> <i
                                                class="mdi mdi-square-edit-outline"></i></a>

                                </td>
                            </tr>

@endforeach
                            </tbody>
                        </table>

                        <div class="text-center d-flex justify-content-center mt-2">
                            {{ $albums->links() }}
                            </div>
                    </div>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection

@section('script')

    <script src="{{ URL::asset('assets/libs/jquery-nice-select/jquery-nice-select.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/switchery/switchery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/multiselect/multiselect.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jquery-mockjax/jquery-mockjax.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/autocomplete/autocomplete.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endsection
