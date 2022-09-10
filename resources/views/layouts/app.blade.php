<!DOCTYPE html>
<html lang="en">

<head>

    <title>Adminty - @yield('title')</title>

    @include('layouts.head')

</head>

<body>
<!-- Pre-loader start -->
@include('layouts.preloader')
<!-- Pre-loader end -->

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include('layouts.navbar')

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                @include('layouts.sidebar')

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.script')

</body>

</html>
