<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ORGANIKITA : Site Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logoo.png">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Datatable css -->
    <link href="{{ asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Font Awesome-->
    <link href="{{ asset('assets') }}/icon/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets') }}/images/logoo.png" alt="" height="22">
                            </span>
                        </a>
                    </div>
                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i
                            class="fa fa-fw fa-bars"></i> </button>
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..."> <span
                                class="uil-search"></span>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="uil-search"></i> </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item notif-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="uil-bell"></i> <span
                                class="badge bg-green rounded-pill">3</span> </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications </h5>
                                    </div>
                                    <div class="col-auto"> <a href="#!" class="small"> Mark all as
                                            read</a> </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs"> <span
                                                    class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min
                                                    ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="uil-arrow-circle-right me-1"></i> View More.. </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img
                                class="rounded-circle header-profile-user"
                                src="{{ asset('assets') }}/images/image_one.png" alt="Header Avatar"> <span
                                class="d-none d-xl-inline-block ms-1 fw-medium font-size-14">
                                @guest @else{{ Auth::user()->name }} @endguest</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#">
                                <i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i>
                                <span class="align-middle">View Profile</span>
                            </a>
                            <a class="dropdown-item d-block" href="#">
                                <i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i>
                                <span class="align-middle">Settings</span>
                                <span class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                                <span class="align-middle">Sign out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets') }}/images/logoo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg" style="margin-left: 40px;">
                        <img src="{{ asset('assets') }}/images/logogreenpanjang.png" alt="" height="22">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div data-simplebar class="sidebar-menu-scroll">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li class="{{ request()->is('/') ? 'mm-active' : '' }}">
                            <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'mm-active' : '' }}">
                                <i class="fas fa-home me-2" data-inline="false"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-title">Masters</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-users me-2" data-inline="false"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('user') }}">User</a></li>
                                <li><a href="{{ route('customer') }}">Customer</a></li>
                                <li><a href="{{ route('role') }}">Role</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('productcategory') }}" class="">
                                <i class="fa fa-server me-2" data-inline="false"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('store') }}" class="___class_+?86___">
                                <i class="fas fa-store me-2" data-inline=" false"></i>
                                <span>Store</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product') }}" class="___class_+?88___">
                                <i class="fa fa-sitemap me-2" data-inline="false"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="menu-title">Transactions</li>
                        <li class="{{ request()->is('transaction-by-status') ? 'mm-active' : '' }}">
                            <a href="{{ route('transaction') }}"
                                class="{{ request()->is('transaction-by-status') ? 'mm-active' : '' }}">
                                <i class="fa fa-list me-2" data-inline="false"></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('review') }}" class="___class_+?94___">
                                <i class="fa fa-search me-2" data-inline="false"></i>
                                <span>Review</span>
                            </a>
                        </li>
                        <li class="menu-title">Courses</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fab fa-discourse me-2" data-inline="false"></i>
                                <span>Courses</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('feature') }}">Feature</a></li>
                                <li><a href="{{ route('course') }}">Course</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('membercourse') }}" class="___class_+?99___">
                                <i class="fa fa-users me-2" data-inline="false"></i>
                                <span>Member Course</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonial') }}" class="___class_+?99___">
                                <i class="far fa-comments me-2" data-inline="false"></i>
                                <span>Testimonial</span>
                            </a>
                        </li>
                        <li class="menu-title">Blogs</li>
                        {{-- <li>
                            <a href="{{ route('membercourse') }}" class="___class_+?99___">
                                <i class="fa fa-users me-2" data-inline="false"></i>
                                <span>Member Course</span>
                            </a>
                        </li> --}}
                        <li class="menu-title">Reports</li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="main-content">
            @yield('content')
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © PT. Organik Kita
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <div class="rightbar-overlay"></div>
    @yield('script')
</body>

</html>
