<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page</title>
    <link rel="apple-touch-icon" href="{{ asset('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>

        .brand-logo img {
            max-width: 130px;
        }

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Forgot Password basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="https://bimsc.us" class="brand-logo">
                                    <img class="dark-logo" src="{{ asset('/assets/images/bimsc-logo.png ') }}" alt="logo">

                                </a>

                                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

                                <form class="auth-form mt-2" id="forgotForm" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus />
                                    </div>
                                    <button id="forgotSubmitBtn" class="btn btn-primary w-100" tabindex="2">Send reset link</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="login"> <i data-feather="chevron-left"></i> Back to login </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Forgot Password basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/app-assets/js/scripts/pages/auth-login.js') }}"></script>
    <!-- END: Page JS-->

    <script>
document.addEventListener('DOMContentLoaded', function () {
document.getElementById('forgotForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const button = document.getElementById('forgotSubmitBtn');
    const originalText = button.innerHTML;
    if (!email) {
    Swal.fire({ icon: 'warning', text: 'Email is required!' });
    button.innerHTML = originalText;
    button.disabled = false;
    return;
    }

    button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...`;
    button.disabled = true;

    fetch("{{ route('password.update') }}", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('[name=_token]').value,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email })
    })
    .then(async response => {
        if (!response.ok) {
            const errorData = await response.json();
            throw errorData;
        }
        return response.json();
    })
    .then(data => {
        Swal.fire({
            title: 'Success',
            text: data.message || 'Reset link sent to your email!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
                window.location.href = "{{ route('login') }}";
        });
    })
    .catch(error => {
        let message = 'Something went wrong.';
        if (error?.errors?.email) {
            message = error.errors.email[0];
        }
        Swal.fire({
            title: 'Error',
            text: message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        })
    .finally(() => {
        // Restore button state
        button.innerHTML = originalText;
        button.disabled = false;
    });
});
});
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>