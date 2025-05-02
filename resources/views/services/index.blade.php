@extends('layouts.app')

@section('title', 'Services')
@section('page-styles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <!-- END: Page CSS-->
    <style>
        .dt-buttons button {
            border: 1px solid #82868b !important;
            background-color: transparent;
            color: #82868b;
            padding: 0.386rem 1.2rem;
            font-weight: 500;
            font-size: 1rem;
            border-radius: 0.358rem;
        }
        .dt-buttons button:hover {
            color: #fff;
            background-color: #7367f0;
            border-color: #7367f0;
        }
        button.dt-button.add-new.btn.btn-primary {
            padding: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-analytics">
                
                <!-- List DataTable -->
                <div class="row">
                    <div class="col-12">
                        <div class="card invoice-list-wrapper">
                            <div class="card-datatable table-responsive">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client</th>
                                            <th>Total</th>
                                            <th class="text-truncate">Issued Date</th>
                                            <th>Balance</th>
                                            <th>Invoice Status</th>
                                            <th class="cell-fit">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#5089</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <span class="avatar-content">AB</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Apple Brothers</span>
                                                        <small class="text-muted">apple@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$1,299</td>
                                            <td>15 Jan 2023</td>
                                            <td>$0</td>
                                            <td><span class="badge rounded-pill bg-success">Paid</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><i data-feather="download" class="me-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="edit" class="mx-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5088</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <span class="avatar-content">TC</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Tech Corp</span>
                                                        <small class="text-muted">tech@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$2,499</td>
                                            <td>12 Jan 2023</td>
                                            <td>$499</td>
                                            <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><i data-feather="download" class="me-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="edit" class="mx-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5087</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar bg-light-info me-1">
                                                        <span class="avatar-content">DS</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Digital Solutions</span>
                                                        <small class="text-muted">digital@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$899</td>
                                            <td>10 Jan 2023</td>
                                            <td>$0</td>
                                            <td><span class="badge rounded-pill bg-success">Paid</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><i data-feather="download" class="me-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="edit" class="mx-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5086</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar bg-light-danger me-1">
                                                        <span class="avatar-content">MW</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Media World</span>
                                                        <small class="text-muted">media@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$1,599</td>
                                            <td>05 Jan 2023</td>
                                            <td>$0</td>
                                            <td><span class="badge rounded-pill bg-success">Paid</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><i data-feather="download" class="me-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="edit" class="mx-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5085</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar bg-light-secondary me-1">
                                                        <span class="avatar-content">GC</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Global Corp</span>
                                                        <small class="text-muted">global@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$3,299</td>
                                            <td>02 Jan 2023</td>
                                            <td>$1,299</td>
                                            <td><span class="badge rounded-pill bg-danger">Overdue</span></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><i data-feather="download" class="me-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="edit" class="mx-1"></i></a>
                                                    <a href="#" class="text-body"><i data-feather="trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ List DataTable -->
            </section>

        </div>
    </div>
@endsection
@section('page-scripts')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/extensions/moment.min.js') }}"></script>

    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <!-- END: Page JS-->
    <script>
         var tableConfig = {
            order: [[0, 'desc']],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            buttons: [
                'copyHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        };

        tableConfig.buttons.push({
            text: 'Add New Service',
            className: 'add-new btn btn-primary',
            // attr: {
            //     'data-bs-toggle': 'modal',
            //     'data-bs-target': '#inlineForm'
            // },
            init: function(api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        });
        $(document).on("click",".add-new",function() {
            $(location).prop('href', "{{ route('service.create') }}");
        });

        var table = $('.datatables-basic').DataTable(tableConfig);

    </script>
@endsection