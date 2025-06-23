@extends('layouts.app')

@section('title', 'Package')
@section('page-styles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/form-quill-editor.css') }}">
   
    <!-- END: Page CSS-->
    <style>
        .ql-editor {
            min-height: 200px;
        }
        .form-control:disabled {
            background-color: #efefef;
        }
        .select2-results__option.select2-results__option--highlighted {
            color: #ffff !important;
            background: #084025 !important;
        }
        .dark-layout .select2-container .select2-selection--multiple .select2-selection__choice {
            color: #ffff !important;
        } 
    </style>
@endsection
@section('content')

    <div class="content-body">
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                         <form id="packageForm" class="form form-vertical" enctype="multipart/form-data" method="POST" data-action="{{ route('admin.packages.update', $package->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ $package->title }}" class="form-control" placeholder="First Name">
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Project Limit</label>
                                    <input type="number" name="project_limit" value="{{ $package->project_limit }}" class="form-control" placeholder="Project Limit">
                                </div>
                                </div>                          
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Task Limit Per Project</label>
                                    <input type="number" name="task_limit_per_project" value="{{ $package->task_limit_per_project }}" class="form-control" placeholder="Task Limit Per Project">
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Price</label>
                                <div class="input-group mb-1">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="100" value="{{ $package->price }}" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">.00</span>
                                    </div>                          
                                </div>                          
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
@section('page-scripts')

    <script>

       $("#packageForm").submit(function(e) {
    e.preventDefault();
    var form = new FormData(this);
    const url = $(this).data('action'); // <-- dynamic route

    $(this).find('button[type=submit]').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
    $(this).find('button[type=submit]').prop('disabled', true);
    var thiss = $(this);

    $('body').waitMe({
        effect: 'bounce',
        text: '',
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
    });

    $.ajax({
        type: 'post',
        url: url,
        data: form,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.fa.fa-spinner.fa-spin').remove();
            $('body').waitMe('hide');
            $(thiss).find('button[type=submit]').prop('disabled', false);

            if (!response.status) {
                Swal.fire({
                    title: response.title,
                    text: response.message,
                    icon: response.icon,
                });
            } else {
                if (response.auto_redirect) {
                    window.location.href = response.redirect_url;
                } else {
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                    });
                }
            }
        },
        error: function(xhr) {
            $('.fa.fa-spinner.fa-spin').remove();
            $('body').waitMe('hide');
            $(thiss).find('button[type=submit]').prop('disabled', false);

            if (xhr.status === 422) {
                let response = xhr.responseJSON;
                let errors = response.errors;
                let errorHtml = '<ul>';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value[0] + '</li>';
                });
                errorHtml += '</ul>';
                Swal.fire({
                    title: 'Validation Error',
                    html: errorHtml,
                    icon: 'error'
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                    icon: 'error'
                });
            }
        }
    });
});

    </script>
@endsection