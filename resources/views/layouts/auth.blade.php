<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/auth/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/auth/images/favicon.ico') }}" />
    {{-- Sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('styles')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img
                        src="{{ asset('assets/auth/images/laravel.svg') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ asset('assets/auth/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('assets/auth/images/faces/face1.jpg') }}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                                <a id="btn-logout" class="dropdown-item" href="#">
                                    <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('assets/auth/images/faces/face1.jpg') }}" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                {{-- <span class="text-secondary text-small">Project Manager</span> --}}
                            </div>
                            {{-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Posts</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-note-outline menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('posts.create') }}">Create
                                        Post</a></li>
                                <li class="nav-item"> <a href="{{ route('posts.index') }}" class="nav-link"
                                        href="pages/ui-features/typography.html">Posts</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            @yield('content')

            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2021</span>
                    <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                            href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                            admin template</a> from Bootstrapdash.com</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/auth/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/auth/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/auth/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/auth/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/auth/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/auth/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/auth/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @yield('scripts')
    <script>
        $(document).ready(() => {
            $('#btn-logout').click(() => {
                $('#logout-form').submit();
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            swal("Good job!", "{{ Session::get('success') }}", "success");
        @endif
    </script>
</body>

</html>