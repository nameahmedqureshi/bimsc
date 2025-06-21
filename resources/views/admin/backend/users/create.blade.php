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
                            <form id="userForm" class="form form-vertical" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6  col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">First Name</label>
                                            <input type="text" id="f-name" class="form-control" value="" name="f_name" placeholder="First Name" />

                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Last Name</label>
                                            <input type="text" id="l-name" class="form-control" value="" name="l_name" placeholder="Last Name" />

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <div class="mb-1">
                                            <label for="login-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" value="" id="login-email" name="user_email" placeholder="john@example.com" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="status">Role</label>
                                            <select class="form-select" id="status" name="user_role" required>
                                                <option selected disabled>Select Role</option>
                                                <option value="client">Client</option>
                                                <option value="team">Team Member</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="status">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option selected disabled>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label" for="password">Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="2" autofocus />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label class="form-label" for="reset-password-confirm">Confirm Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">

                                            <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="password_re" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-confirm" tabindex="3" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-12" style="margin-top: 20px;">
                                        <input type="hidden" value="store" name="action">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
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
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = new FormData(this);
            const url = `/admin/users`;

            // console.log('form', form);
            $(this).find('button[type=submit]').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
            $(this).find('button[type=submit]').prop('disabled', true);
            var thiss = $(this);
            $('body').waitMe({
                effect: 'bounce',
                text: '',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000',
                maxSize: '',
                waitTime: -1,
                textPos: 'vertical',
                fontSize: '',
                source: '',
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
                    //  console.log(response);
                    if (!response.status) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,
                        })
                        

                    } else{
                            if (response.auto_redirect) {window.location.href = response.redirect_url;}
                            else{ 
                                Swal.fire({
                                    title: response.title,
                                    text:  response.message,
                                    icon: response.icon,
                                }).then((willDelete) => {
                                if (response.redirect_url) {window.location.href = response.redirect_url;}
                                }); 
                            }
                        
                        } 
                },
                error: function(xhr) {
                $('.fa.fa-spinner.fa-spin').remove();
                $('body').waitMe('hide');
                $(thiss).find('button[type=submit]').prop('disabled', false);

                if (xhr.status === 422) {
                    // Validation error
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
                    // Generic error
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