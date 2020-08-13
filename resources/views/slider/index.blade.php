@extends('layouts.master-rtl')



@section('css')
<!-- Plugins css -->
<style>
    /* desktop */
    @media only screen and (min-width:900px) and (max-width :2000px) {
        .sliderdiv {
            width: 30%;
            height: 350px;
        }
    }

    /* moball */
    @media only screen and (min-width:300px) and (max-width :900px) {
        .sliderdiv {
            width: 100%;
            height: 350px;
        }
    }
</style>
@endsection
<!-- Start Content-->
@section('content')
<div class="d-flex mt-3 flex-wrap div">
    @foreach($sliders as $slider)
    <div class=" card-box mr-2 text-center d-flex  flex-column align-items-center  sliderdiv">
        <img src="{{$urlstorge . $slider->images}}" class="img-fluid mb-2" style="width: 200px;border-radius: 50%;height: 300px;">
        <span class="" style="overflow: hidden; height: 300px;">{{$slider->title}}
        </span>
        <a href="{{ url('slider/'.$slider->_id.'/edit') }}" class="btn btn-success align-self-end mt-3 text-white">ویرایش</a>
    </div>
    @endforeach

</div>
@endsection
@section('script')

@endsection
