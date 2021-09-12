@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Blog</li>
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
                            @if (session('success-message'))
                            <div class="alert alert-green alert-dismissible fade show" role="alert">
                                {{ session('success-message') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close">
                                </button>
                            </div>
                            @elseif (session('failed-message'))
                                <div class="alert alert-red alert-dismissible fade show" role="alert">
                                    {{ session('failed-message') }} : {{ $errors->content->first() }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            <form method="post" action="{{ route('blogsave') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" autocomplete="off" name="title" placeholder="Type new title ..." required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Image</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" required name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">     
                                        <textarea id="summernote" required name="editordata"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end mt-3">
                                    <div class="col-sm-2">
                                        <a href="{{ route('blog') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-green">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
