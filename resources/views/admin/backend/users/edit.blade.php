@extends('layouts.app')

@section('title', 'Users')
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
                         <form id="userForm" class="form form-vertical" enctype="multipart/form-data" method="POST" data-action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="f_name" value="{{ $user->first_name }}" class="form-control" placeholder="First Name">
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="l_name" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name">
                                </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="user_email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                </div> -->
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Role</label>
                                    <select name="user_role" class="form-select">
                                        <option selected disabled>Select Role</option>
                                        <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
                                        <option value="team" {{ $user->role == 'team' ? 'selected' : '' }}>Team Member</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option selected disabled>Select Status</option>
                                        <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">New Password (optional)</label>
                                    <input type="password" name="password" class="form-control" placeholder="New Password">
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_re" class="form-control" placeholder="Confirm Password">
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

       $("#userForm").submit(function(e) {
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