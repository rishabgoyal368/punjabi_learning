<!-- Header -->
<header class="header">

    @if(Session::has('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
    @endif
    <!-- Top Header Section -->
    <div class="top-header-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="logo my-3 my-sm-0">
                        <a href="{{url('/')}}">
                            <!-- <img src="" alt="logo image" class="img-fluid" width="100"> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                    <div class="user-block d-none d-lg-block">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">



                                <!-- user info-->
                                <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                        <div class="user-avatar d-inline-block">
                                            <img src="{{asset('assets/img/profiles/img-6.jpg')}}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                        </div>
                                    </a>

                                    <!-- Notifications -->
                                    <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                        
                                        <a class="dropdown-item p-2" href="{{ url('updateprofile') }}" >
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    {{ __('Profile') }}
                                                </span>
                                            </span>
                                        </a>
                                        <a class="dropdown-item p-2" href="{{ url('updatepassword') }}" >
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    {{ __('Update password') }}
                                                </span>
                                            </span>
                                        </a>
                                        <a class="dropdown-item p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    {{ __('Logout') }}
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <!-- Notifications -->

                                </div>
                                <!-- /User info-->

                            </div>
                        </div>
                    </div>
                    <div class="d-block d-lg-none">
                        <a href="javascript:void(0)">
                            <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                        </a>

                        <!-- Offcanvas menu -->
                        <div class="offcanvas-menu" id="offcanvas_menu">
                            <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                            <div class="user-info align-center bg-theme text-center">
                                <a href="javascript:void(0)" class="d-block menu-style text-white">
                                    <div class="user-avatar d-inline-block mr-3">
                                        <img src="{{asset('assets/img/profiles/img-6.jpg')}}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                    </div>
                                </a>
                            </div>
                            <div class="user-notification-block align-center">
                                <div class="top-nav-search">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here">
                                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="user-menu-items px-3 m-0">
                                <a class="px-0 pb-2 pt-0" href="index.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-home mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Dashboard</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="employees.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-users mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Job Listing Websites</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="company.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-apartment mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Company</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="calendar.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-calendar-full mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Calendar</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="leave.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-briefcase mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Leave</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="reviews.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-star mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Reviews</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="reports.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-rocket mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Reports</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="manage.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-sync mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Manage</span>
                                        </span>
                                    </span>
                                </a>

                                <a class="p-2" href="settings.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-cog mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Settings</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="employment.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-user mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Profile</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="login.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-power-switch mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Logout</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- /Offcanvas menu -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top Header Section -->

</header>
<!-- /Header -->