@extends('layouts.layoutadmin.layout')
@section('Title', 'Sửa bài')

<style type="text/css">
    @media print {
        .form-section {
            display: inline !important
        }

        .form-pagebreak {
            display: none !important
        }

        .form-section-closed {
            height: auto !important
        }

        .page-section {
            position: initial !important
        }
    }

</style>

<link type="text/css" rel="stylesheet"
    href="https://cdn03.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=5f6c4c83346ec05354558fe8" />

<link rel="stylesheet" href=" {{ asset('plugins/summernote/summernote-bs4.css') }}">

<style type="text/css">
    .form-label-left {
        width: 150px;
    }

    .form-line {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .form-label-right {
        width: 150px;
    }

    .form-all {
        margin-top: 20px;
        margin-right: auto;
        margin-left: auto;
        width: 750px;
        color: #141414 !important;
        font-family: 'Helvetica';
    }

    .form-radio-item label,
    .form-checkbox-item label,
    .form-grading-label,
    .form-header {
        color: false;
    }

</style>

{{-- label --}}

<style>
    #label_add_img {
        color: rgb(0, 195, 255)
    }

    #label_add_img:hover {
        cursor: pointer;
        color: rgb(104, 218, 253);
    }

</style>


@section('content')
    <div style="padding: 8% 0%; ">

        <div class="container">
            <div role="main" class="form-all">
                <div class="row" style="margin-top: 5%">
                    <div class="col">
                        <h3 style="text-align: center">Sửa bài</h3>
                    </div>
                </div>

  

                <form action="{{ route('admin.blog.checkupdate', $data->id_blog) }}" style="margin-top: 2%"  method="POST"
                    enctype="multipart/form-data">
                    @csrf
                
                    <input type="hidden" name="id_blog" value="{{ $data->id_blog }}">
                

                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{ $data->title }}">

                                </div>
                            </div>
                        </div>
                    </div>

                            
                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <label for="">Nội dung</label>
                                        <textarea class="form-control ckeditor" id="description" name="content" required
                                        cols="100" rows="10">{{ $data->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row" style="margin-top: 5%; margin-left: 66px">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            
                            <div class="row">
                                
                                <label for="">Chọn ảnh</label>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    
                                    <input type="file" class="custom-file-input" id="file1" name="thumbnail"
                                    multiple>

                                <label class="custom-file-label" for="">Choose file</label>
                                </div>
                                <img id="image1" style="width: 88%" />
                            </div>
                        </div>
                    </div>



                   

               



                    <input type="text" name="count" id="count" style="display: none">


                    <div class="row" style="margin-top: 5%">

                        <div class="col" style="text-align: center">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Sửa bài</button>
                            </div>

                        </div>
                    </div>



                    <!-- /.card-header -->




                </form>



            </div>
        </div>

    </div>










    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-fileinput.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        document.getElementById("file1").onchange = function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("image1").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>







@endsection
