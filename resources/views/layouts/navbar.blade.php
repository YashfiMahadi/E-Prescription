<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo bg-white">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="index-1.htm">
                <img class="img-fluid mx-5" src="{{ asset('assets\images\logi_rpu.png') }}" width="120" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
                            {{-- <span class="badge bg-c-pink">5</span> --}}
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li>
                                <div class="media">
                                    {{-- <img class="d-flex align-self-center img-radius" src="{{ asset('assets\images\avatar-4.jpg') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">John Doe</h5>
                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets\images\avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>John Doe</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="#!">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="user-profile.htm">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="auth-normal-sign-in.htm">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
