@extends('layouts.app')

@section('title', 'Users')
@section('page-styles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <!-- END: Page CSS-->
    <style>
        .avatar img {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Created at</th>
                                            <th class="cell-fit">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <span class="avatar-content">{{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}</span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bold">{{ $user->first_name }} {{ $user->last_name }}</span>
                                                    <small class="text-muted">{{ $user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.user.edit', $user->id) }}" class="text-body">
                                                    <i data-feather="edit" class="mx-1"></i>
                                                </a>
                                               <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline delete-user-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-link text-body p-0 btn-delete-user" data-user-id="{{ $user->id }}">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
            text: 'Add New User',
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
            $(location).prop('href', "{{ route('admin.user.create') }}");
        });
        var table = $('.datatables-basic').DataTable(tableConfig);

    $(document).on('click', '.btn-delete-user', function (e) {
        e.preventDefault();
        const form = $(this).closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // submit the actual form
            }
        });
    });

    </script>
@endsection