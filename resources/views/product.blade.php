@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Product</li>
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
                            <button type="button" class="btn btn-green mb-3" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add new</button>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-centered table-nowrap mb-0"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Store</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $number => $data)
                                            <tr>
                                                <td>{{ ++$number }}</td>
                                                <td>{{ $data->productName }}</td>
                                                <td>{{ $data->storeName }}</td>
                                                <td>{{ $data->productCategoryName }}</td>
                                                <td>
                                                    @if ($data->productStatus == 0)
                                                        <span class="badge bg-warning">Not Publish</span>
                                                    @elseif ($data->productStatus == 1)
                                                        <span class="badge bg-green">Publish</span>
                                                    @elseif ($data->productStatus == 2)
                                                        <span class="badge bg-green">Waiting</span>
                                                    @endif
                                                </td>
                                                <td>@currency($data->productPrice)</td>
                                                <td class="text-center">
                                                    <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $data->productId }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg>
                                                    </a>
                                                    <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $data->productId }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                    <a class="btn btn-green btn-sm mb-1" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $data->productId }}">
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
    </div>
    <!-- Modal -->
    <form action="{{ route('productsave') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" autocomplete="off" name="name"
                                        placeholder="Type new name ..." required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                        onkeypress="return onlyNumber(event)" name="price" placeholder="Type new price ..."
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-select" name="productcategory" required>
                                        @foreach ($productCategory as $data)
                                            <option value="{{ $data->productCategoryId }}">
                                                {{ $data->productCategoryName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Store</label>
                                    <select class="form-select" name="store" required>
                                        @foreach ($store as $data)
                                            <option value="{{ $data->storeId }}">{{ $data->storeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control" autocomplete="off"
                                        onkeypress="return onlyNumber(event)" name="stock" placeholder="Type new stock ..."
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Type new description ..." name="description"
                                        style="height: 100px" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">Status</label>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="0"
                                            required>
                                        <label class="form-check-label" for="status1">Non Publish</label>
                                    </div>
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="status" id="status2" value="1"
                                            required>
                                        <label class="form-check-label" for="status2">Publish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" required name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-green">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @foreach ($product as $data)
        <form action="/product-category/update" method="POST">
            @method('PUT')
            @csrf
            <div class="modal" tabindex="-1" id="editModal{{ $data->productId }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update product category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="{{ $data->productId }}" name="id" required />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" value="{{ $data->productName }}" class="form-control" autocomplete="off" name="name"
                                            placeholder="Type new name ..." required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" value="{{ $data->productPrice }}" class="form-control" autocomplete="off"
                                            onkeypress="return onlyNumber(event)" name="price" placeholder="Type new price ..."
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-select" name="productcategory" required>
                                            @foreach ($productCategory as $dataone)
                                                <option value="{{ $dataone->productCategoryId }}">
                                                    {{ $dataone->productCategoryName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Store</label>
                                        <select class="form-select" name="store" required>
                                            @foreach ($store as $datatwo)
                                                <option value="{{ $datatwo->storeId }}">{{ $datatwo->storeName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <input type="text" class="form-control" value="{{ $data->productStock }}" autocomplete="off"
                                            onkeypress="return onlyNumber(event)" name="stock" placeholder="Type new stock ..."
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" placeholder="Type new description ..." name="description"
                                            style="height: 100px" required>{{ $data->productDescription }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label">Status</label>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="0"
                                                required>
                                            <label class="form-check-label" for="status1">Non Publish</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="status" id="status2" value="1"
                                                required>
                                            <label class="form-check-label" for="status2">Publish</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" required name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-green">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    @foreach ($product as $data)
        <form action="{{ route('productdelete') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal" tabindex="-1" id="deleteModal{{ $data->productId }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" required value="{{ $data->productId }}" />
                            <h6>Are you sure you delete this data?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-green">Yes</button>
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
        function onlyNumber(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>
@endsection
