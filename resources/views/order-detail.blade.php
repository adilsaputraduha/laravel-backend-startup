@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Order detail</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Order detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-green alert-dismissible fade show" role="alert">
                                @foreach ($transaction as $data)
                                    <h6 class="text-center text-light">{{ $data->transactionName }} -
                                        {{ $data->transactionPhone }}</h6>
                                    <h6 class="text-center text-light">{{ $data->transactionLocationDetail }}</h6>
                                @endforeach
                            </div>
                            <p class="text-center">Products order</p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-centered table-nowrap mb-0"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactionDetails as $number => $data)
                                            <tr>
                                                <td>{{ ++$number }}</td>
                                                <td>{{ $data->productName }}</td>
                                                <td>@currency($data->productPrice)</td>
                                                <td>{{ $data->detailTotalItem }}</td>
                                                <td>{{ $data->detailNote }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">Data transaction</p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                        <li class="list-group-item">User name</li>
                                        <li class="list-group-item">Payment code</li>
                                        <li class="list-group-item">Transaction code</li>
                                        <li class="list-group-item">Total item</li>
                                        <li class="list-group-item">Total price</li>
                                        <li class="list-group-item">Unique code</li>
                                        <li class="list-group-item">Status</li>
                                        <li class="list-group-item">Courier</li>
                                        <li class="list-group-item">Cost Shipping</li>
                                        <li class="list-group-item">Total transfer</li>
                                        <li class="list-group-item">Payment method</li>
                                        <li class="list-group-item">Bank</li>
                                        <li class="list-group-item">Description</li>
                                        <li class="list-group-item">Created At</li>
                                        <li class="list-group-item">Expired At</li>
                                    </ul>
                                </div>
                                <div class="col-sm-8">
                                    @foreach ($transaction as $data)
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $data->name }}</li>
                                            <li class="list-group-item">{{ $data->transactionPaymentCode }}</li>
                                            <li class="list-group-item">{{ $data->transactionCode }}</li>
                                            <li class="list-group-item">{{ $data->transactionTotalItem }}</li>
                                            <li class="list-group-item">@currency($data->transactionTotalPrice)</li>
                                            <li class="list-group-item">{{ $data->transactionUniqueCode }}</li>
                                            <li class="list-group-item">{{ $data->transactionStatus }}</li>
                                            <li class="list-group-item">{{ $data->courierName }}</li>
                                            <li class="list-group-item">@currency($data->transactionCostShipping)</li>
                                            <li class="list-group-item">@currency($data->transactionTotalTransfer)</li>
                                            <li class="list-group-item">{{ $data->transactionMethod }}</li>
                                            <li class="list-group-item">
                                                @if ($data->transactionMethod == 'COD')
                                                    ---
                                                @else
                                                    {{ $data->transactionBank }}
                                                @endif
                                            </li>
                                            <li class="list-group-item">
                                                @if ($data->transactionDescription == null)
                                                    ---
                                                @else
                                                    {{ $data->transactionDescription }}
                                                @endif
                                            </li>
                                            <li class="list-group-item">{{ date('d M Y H:i:s', strtotime( $data->transactionCreatedAt)) }}</li>
                                            <li class="list-group-item">{{ date('d M Y H:i:s', strtotime( $data->transactionExpiredAt)) }}</li>
                                        </ul>
                                    @endforeach
                                </div>
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
    <!-- Datatable -->
    <script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.js"></script>

    <script>
        function onlyNumber(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
        $(document).ready(function() {
            $("#datatable").DataTable()
        });
    </script>
@endsection
