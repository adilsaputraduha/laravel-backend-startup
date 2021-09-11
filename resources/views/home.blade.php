@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">@currency($totalrevenue)</h4>
                                <p class="text-muted mb-0">Total Revenue</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-green me-1"><i
                                        class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $totalorders }}</span></h4>
                                <p class="text-muted mb-0">Orders</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="customers-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $totalcustomers }}</span></h4>
                                <p class="text-muted mb-0">Customers</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $totalproducts }}</span></h4>
                                <p class="text-muted mb-0">Products</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-green me-1"><i
                                        class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <!-- end col-->
                <div class="col-xl-4">
                    <div class="card bg-green">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <p class="text-white font-size-18">Customize <br> <b>Main Website</b> <br> here
                                        <i class="mdi mdi-arrow-right"></i>
                                    </p>
                                    <div class="mt-4"> <a href="javascript: void(0);"
                                            class="btn btn-green waves-effect waves-light">Customize here!</a> </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mt-4 mt-sm-0"> <img src="assets/images/setup-analytics-amico.svg"
                                            class="img-fluid" alt=""> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                                            class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                                class="mdi mdi-chevron-down ms-1"></i></span> </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#">Monthly</a> <a class="dropdown-item"
                                            href="#">Yearly</a> <a class="dropdown-item" href="#">Weekly</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Top Selling Products</h4>
                            <div class="row align-items-center g-0 mt-3">
                                <div class="col-sm-3">
                                    <p class="text-truncate mt-1 mb-0"><i
                                            class="mdi mdi-circle-medium text-green me-2"></i> Desktops </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar progress-bar bg-green" role="progressbar"
                                            style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="52">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                            <div class="row align-items-center g-0 mt-3">
                                <div class="col-sm-3">
                                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-info me-2"></i>
                                        iPhones </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: 45%"
                                            aria-valuenow="45" aria-valuemin="0" aria-valuemax="45">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                            <div class="row align-items-center g-0 mt-3">
                                <div class="col-sm-3">
                                    <p class="text-truncate mt-1 mb-0"><i
                                            class="mdi mdi-circle-medium text-green me-2"></i> Android </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar progress-bar bg-green" role="progressbar"
                                            style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="48">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                            <div class="row align-items-center g-0 mt-3">
                                <div class="col-sm-3">
                                    <p class="text-truncate mt-1 mb-0"><i
                                            class="mdi mdi-circle-medium text-warning me-2"></i> Tablets </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar progress-bar bg-warning" role="progressbar"
                                            style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"> <span class="text-muted">Recent<i
                                                class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                                        <a class="dropdown-item" href="#">Recent</a> <a class="dropdown-item" href="#">By
                                            Users</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Recent Activity</h4>
                            <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 336px;">
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <p class="text-muted mb-1 font-size-13">Today<small
                                                class="d-inline-block ms-1">12:20 pm</small></p>
                                        <p class="mb-0">Andrei Coman magna sed porta finibus, risus posted a new
                                            article: <span class="text-green">Forget UX
                                                Rowland</span></p>
                                    </div>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1 font-size-13">22 Jul, 2020 <small
                                            class="d-inline-block ms-1">12:36 pm</small></p>
                                    <p class="mb-0">Andrei Coman posted a new article: <span class="text-green">Designer
                                            Alex</span></p>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1 font-size-13">18 Jul, 2020 <small
                                            class="d-inline-block ms-1">07:56 am</small></p>
                                    <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented <span
                                            class="text-green"> Developer Moreno</span></p>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1 font-size-13">10 Jul, 2020 <small
                                            class="d-inline-block ms-1">08:42 pm</small></p>
                                    <p class="mb-0">Zack Wetass, Chris combined Commented <span class="text-green">UX
                                            Murphy</span></p>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1 font-size-13">23 Jun, 2020 <small
                                            class="d-inline-block ms-1">12:22 am</small></p>
                                    <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented <span
                                            class="text-green"> Developer Moreno</span></p>
                                </li>
                                <li class="feed-item pb-1">
                                    <p class="text-muted mb-1 font-size-13">20 Jun, 2020 <small
                                            class="d-inline-block ms-1">09:48 pm</small></p>
                                    <p class="mb-0">Zack Wetass, Chris combined Commented <span class="text-green">UX
                                            Murphy</span></p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end Col -->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Users</h4>
                            <div data-simplebar style="max-height: 336px;">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-centered table-nowrap">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20px;"><img src="assets/images/avatar.jpg"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> Nevada</p>
                                                </td>
                                                <td><span class="badge bg-soft-danger font-size-12">Cancel</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-green"
                                                        data-feather="trending-up"></i>$250.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Lolita Hamill</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> Texas</p>
                                                </td>
                                                <td><span class="badge bg-soft-success font-size-12">Success</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-danger"
                                                        data-feather="trending-down"></i>$110.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Robert Mercer</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> California</p>
                                                </td>
                                                <td><span class="badge bg-soft-info font-size-12">Active</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-green"
                                                        data-feather="trending-up"></i>$420.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Marie Kim</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> Montana</p>
                                                </td>
                                                <td><span class="badge bg-soft-warning font-size-12">Pending</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-danger"
                                                        data-feather="trending-down"></i>$120.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Sonya Henshaw</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> Colorado</p>
                                                </td>
                                                <td><span class="badge bg-soft-info font-size-12">Active</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-green"
                                                        data-feather="trending-up"></i>$112.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Marie Kim</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> Australia</p>
                                                </td>
                                                <td><span class="badge bg-soft-success font-size-12">Success</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-danger"
                                                        data-feather="trending-down"></i>$120.00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/avatar.jpg" class="avatar-xs rounded-circle "
                                                        alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">Sonya Henshaw</h6>
                                                    <p class="text-muted font-size-13 mb-0"><i
                                                            class="mdi mdi-map-marker"></i> India</p>
                                                </td>
                                                <td><span class="badge bg-soft-danger font-size-12">Cancel</span></td>
                                                <td class="text-muted fw-semibold text-end"><i
                                                        class="icon-xs icon me-2 text-green"
                                                        data-feather="trending-up"></i>$112.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Transaction</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">#
                                            </th>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Total Transfer</th>
                                            <th>Method Payment</th>
                                            <th>Unique Code</th>
                                            <th>Status</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latesttransactions as $number => $data)
                                            <tr>
                                                <td>{{ ++$number }}</td>
                                                <td>{{ $data->transactionCode }}</td>
                                                <td>{{ date('d M Y', strtotime($data->transactionCreatedAt)) }}</td>
                                                <td>@currency($data->transactionTotalTransfer)</td>
                                                <td>{{ $data->transactionMethod }}</td>
                                                <td>{{ $data->transactionUniqueCode }}</td>
                                                <td>
                                                    @if ($data->transactionStatus == 'DIPROSES')
                                                        <span class="badge bg-warning">DIPROSES</span>
                                                    @elseif ($data->transactionStatus == "DIKIRIM")
                                                        <span class="badge bg-primary">DIKIRIM</span>
                                                    @elseif ($data->transactionStatus == "BATAL")
                                                        <span class="badge bg-danger">BATAL</span>
                                                    @elseif ($data->transactionStatus == "SELESAI")
                                                        <span class="badge bg-green">SELESAI</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('transactiondetail', $data->transactionId) }}"
                                                        class="btn btn-green btn-sm btn-rounded waves-effect waves-light">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets') }}/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- Apercharts -->
    <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/dashboard.init.js"></script>
    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.js"></script>
@endsection
