@extends('layouts.app')

@section('title', 'Blogs')
@section('page-styles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
   
    <!-- END: Page CSS-->
    <style>
          .ql-editor {
            min-height: 200px;
        }
        .form-control:disabled {
            background-color: #efefef;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical manage_service" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3  col-3">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Title *</label>
                                                <input type="text" id="title" class="form-control" value="" name="title" placeholder="Title" />
                                            </div>
                                        </div>

                                       
                                       

                                        <div class="col-md-2  col-2">
                                            <div class="mb-1">
                                                <label class="form-label" for="status">Status *</label>
                                                <select class="form-select" name="status" id="status">
                                                    <option  value="active">Active</option>
                                                    <option  value="in_active">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-10  col-12 add_desc mb-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- <p class="card-text">Please Add Description</p> -->
                                                    <label class="form-label" for="end_time">Please Add Description</label>
                                                    <div id="full-wrapper">
                                                        <div id="full-container">
                                                            <div class="editor">
                                                                <?= $description ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2  col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="website-vertical">Service Image</label>
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" name="service_image" accept="image/png, image/jpeg" />
                                                        <label for="imageUpload">
                                                            <i data-feather='edit' style="width: 33px; height: 29px;"></i>
                                                        </label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('{{ asset('/assets/images/no-preview.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    

                                        <div class="col-12">
                                            <input type="hidden" value="<?= $_GET['id'] ?>" name="post_id">
                                            <input type="hidden" value="add_update_services" name="action">
                                            <button type="submit" class="btn btn-primary me-1"><?= isset($_GET['id']) ? 'Update' : 'Submit'  ?></button>
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
@section('page-scripts')
    <!-- BEGIN: Page JS-->

    <script src="{{ asset('/app-assets/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('/app-assets/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('/app-assets/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/app-assets/app-assets/vendors/js/editors/quill/image-resize.min.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'], // remove formatting button
            ['link', 'image'],

        ];

        var container = $('.editor');
        var quill = new Quill('.editor', {
            modules: {
                imageResize: {
                    displaySize: true
                }, // default false
                toolbar: toolbarOptions,
            },
            theme: 'snow'
        });
    </script>
@endsection