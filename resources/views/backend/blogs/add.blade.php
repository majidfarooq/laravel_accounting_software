@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-10">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Heliplines</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">New Heliplines</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Blogs</h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create new Blogs</h4>
                        <p class="text-muted mb-3">orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card py-3">
                    <div class="card-body">
                        @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @elseif ($message = \Illuminate\Support\Facades\Session::get('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        {!! Form::open(array('route' => 'storeBlogs','id' => 'formSubmit','class'=>'form-horizontal','files' => true)) !!}
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Meta Description</label>
                                        <textarea class="form-control editor" name="meta_description" id="meta_description" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Title">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Content</label>
                                        <textarea class="form-control editor" name="content" id="content" rows="6" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Image</label>
                                        <input type="file" class="form-control" name="main_image" id="main_image" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Video Link</label>
                                        <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Video Link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Video Type</label>
                                        <input type="text" class="form-control" name="video_type" id="video_type" placeholder="Video Type">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Is Disabled</label>
                                        <select class="form-control" name="is_disabled">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Meta Description">Is featured</label>
                                        <select class="form-control" name="is_featured">
                                            <option value="">Select</option>
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 text-right">
                                <input type="submit" class="btn btn-primary text-white" value="Save &amp; Continue">
                            </div>
                            <!--end form-grop-->
                    {{ Form::close() }}
                    <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->
    </div>

@endsection
@section('script')
    @include('flashy::message')
    <script type="application/javascript" src="{{ asset('public/assets/backend/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'.editor',
            theme: 'modern',
            height: 200,
            forced_root_block : "",
            force_br_newlines : false,
            force_p_newlines : false,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            remove_script_host : false,
            convert_urls : false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
        });
    </script>
@endsection
