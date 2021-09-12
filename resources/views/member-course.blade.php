@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Member Course</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Member Course</li>
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
                            <p class="text-center">Status : Waiting</p>
                            <table id="datatable" class="table table-centered dt-responsive table-nowrap mb-0"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membercourse as $number => $data)
                                        <tr>
                                            <td>{{ ++$number }}</td>
                                            <td>{{ $data->memberName }}</td>
                                            <td>{{ $data->memberEmail }}</td>
                                            <td>{{ $data->memberPhone }}</td>
                                            <td>{{ $data->memberGender }}</td>
                                            <td>
                                                @if ($data->memberStatus == 0)
                                                    <span class="badge bg-warning">Menunggu</span>
                                                @else
                                                    <span class="badge bg-green">Terdaftar</span>
                                                @endif
                                            </td>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                    data-bs-target="#editModalWaiting{{ $data->memberId }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                </a>
                                                <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $data->memberId }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">Status : Registered</p>
                            <table id="datatable1" class="table table-centered dt-responsive table-nowrap mb-0"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membercourseregistered as $number => $data)
                                        <tr>
                                            <td>{{ ++$number }}</td>
                                            <td>{{ $data->memberName }}</td>
                                            <td>{{ $data->memberEmail }}</td>
                                            <td>{{ $data->memberPhone }}</td>
                                            <td>{{ $data->memberGender }}</td>
                                            <td>
                                                @if ($data->memberStatus == 0)
                                                    <span class="badge bg-warning">Menunggu</span>
                                                @else
                                                    <span class="badge bg-green">Terdaftar</span>
                                                @endif
                                            </td>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                    data-bs-target="#editModalRegistered{{ $data->memberId }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                </a>
                                                <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $data->memberId }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg>
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
    <!-- Modal -->
    @foreach ($membercourseregistered as $data)
        <form action="{{ route('updatestatusmember') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal" tabindex="-1" id="editModalRegistered{{ $data->memberId }}">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update status member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" value="{{ $data->memberId }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Status Member</label>
                                        <select class="form-select" name="status" required>
                                            @if ($data->memberStatus == 0)
                                                <option value="1">Terdaftar</option>
                                            @else
                                                <option value="0">Menunggu</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-green">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    @foreach ($membercourse as $data)
    <form action="{{ route('updatestatusmember') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal" tabindex="-1" id="editModalWaiting{{ $data->memberId }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update status member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="{{ $data->memberId }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Status Member</label>
                                    <select class="form-select" name="status" required>
                                        @if ($data->memberStatus == 0)
                                            <option value="1">Terdaftar</option>
                                        @else
                                            <option value="0">Menunggu</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-green">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
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
         $(document).ready(function() {
            $("#datatable").DataTable()
            $("#datatable1").DataTable()
        });
    </script>
@endsection
