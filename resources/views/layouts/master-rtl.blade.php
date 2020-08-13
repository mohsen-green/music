<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>jaaaana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/000000/musical--v1.png">
    @include('layouts.head-rtl')
    {{-- <link rel="stylesheet" href="{{ asset('css/persian.datepicker.css') }}" />
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/persian.date.js') }}"></script>
    <script src="{{ asset('js/persian.datepicker.js') }}"></script> --}}

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @yield('content')

            </div> <!-- content -->
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @include('layouts.footer-script')


    </script>

</body>

</html>
