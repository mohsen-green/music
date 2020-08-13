<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title">داشبورد</li>
                <li>
                    <a href="" class="disabled">
                        <i class="fad fa-tachometer-slow"></i>
                        <span> داشبورد </span>
                    </a>

                </li>

                <li class="menu-title">مدیریت آهنگ ها</li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-cassette-tape"></i>
                        <span> ژانر ها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('/genre/create/') }}"> افزودن ژانر </a>
                        </li>
                        <li>
                            <a href="{{ url('/genre/')  }}">همه ژانرها </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fad fa-album-collection"></i>
                        <span> آلبوم ها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('/album/create') }}"> افزودن آلبوم</a>
                        </li>
                        <li>
                            <a href="{{ url('/album') }}">همه آلبوم ها</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fad fa-user-music"></i>
                        <span> هنرمندان </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li>
                            <a href="{{url('/artist/create')}}">افزودن هنرمند</a>
                        </li>
                        <li>
                            <a href="{{ url('artist/')}}">همه هنرمندان</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-music"></i>
                        <span> آهنگ ها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li>
                            <a href="{{url('/music/create')}}"> افزودن آهنگ </a>
                        </li>
                        <li>
                            <a href="{{url('/music')}}"> همه آهنگ ها </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-list-music"></i>
                        <span> پلی لیست ها </span>
                        <span class="menu-arrow"></span>
                    </a>

                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-music"></i>
                        <span> کانال ها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('/channel/create') }}"> افزودن کانال </a>
                        </li>
                        <li>
                            <a href="{{ url('/channel') }}"> همه کانال ها </a>
                        </li>


                    </ul>
                </li>


                <li class="menu-title">مدیریت کاربران</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-tie"></i>
                        <span> مدیران </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{url('admin/create')}}"> افزودن مدیر</a>
                        </li>
                        <li>
                            <a href="{{url('admin/')}}"> مدیران </a>
                        </li>
                    </ul>
                </li>






                <li class="menu-title">ابزارها</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-chart-area"></i>
                        <span> اسلایدر </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{url('slider/create')}}">افزودن اسلایدر</a>
                        </li>
                        <li>
                            <a href="{{ url('slider/') }}"> اسلایدرها </a>
                        </li>
                    </ul>
                </li>







                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
