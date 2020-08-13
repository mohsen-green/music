<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">




        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
             <img src="https://img.icons8.com/color/48/000000/admin-settings-male.png"/>

                <span class="pro-user-name ml-1">
                    @if(Auth::check())
                        {{Auth::user()->name}}
                    @endif
                     <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">خوش امدید !</h6>
                </div>


                <!-- item-->

                <div class="dropdown-divider"></div>

                <!-- item-->
            <a href="" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>خروج</span>
                </a>

            </div>
        </li>



    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="" class="logo text-center ">
            <span class="logo-lg">
<img src="https://img.icons8.com/color/48/000000/musical--v1.png"/>

                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="https://img.icons8.com/color/48/000000/musical--v1.png"" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>



    </ul>
</div>
<!-- end Topbar -->
