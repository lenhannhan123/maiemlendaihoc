@extends('layouts.layoutadmin.layout')
@section('title', 'Thêm chuyên ngành mới')

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
                        <h3 style="text-align: center">Xem thông tin</h3>
                    </div>
                </div>




                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tên trường</label>
                                    <select disabled name="ID_school" id="ID_school" class="form-control" >
                                       <option value="">{{$ds["name_school"]}}</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Nhóm ngành</label>
                                    <select disabled name="ID_group_majors" id="ID_group_majors" class="form-control"
                                        onchange="checkgroup()">
                                        <option value="">Vui lòng chọn nhóm ngành</option>
                                            <option >{{$ds["group"]}}</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tên chuyên ngành</label>
                                    <select disabled name="ID_majors" id="ID_majors" class="form-control" disabled>
                                        <option value="">{{$ds["majors"]}}</option>
                                    </select>


                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Loại chương trình</label>
                                    <select disabled name="ID_school_programs" id="ID_school_programs" class="form-control">
               
                                            <option >{{ $ds['Program_name'] }}</option>
                 
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>




                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Nhập tiêu đề</label>
                                    <input disabled type="text" class="form-control" placeholder="Nhập tiêu đề" name="Title"
                                        id="Title" required value="{{$ds["Title"]}}" >
                                    <div style="color:red">
                                        <label id="messages1"></label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Nhập mô tả</label>
                                    <input disabled type="text" class="form-control" placeholder="Nhập mô tả" name="description"
                                        id="description" required value="{{$ds["description"]}}">
                                    <div style="color:red">
                                        <label id="messages2"></label>
                                    </div>

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
                                    <label for="">Thời gian học</label>
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <input disabled type="number" class="form-control"  placeholder="Nhập thời gian học" name="duration"
                                                id="duration" required value="{{$ds["duration"]}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <div style="margin-top: 15%"> Năm</div>
                                        </div>
                                    </div>

                                    <div style="color:red">
                                        <label id="messages5"></label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tiến độ</label>
                                    <select disabled name="Pace" id="Pace" class="form-control">
                                        <option >{{$ds["Pace"]}}</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Ngôn ngữ giảng dạy</label>
                                    <select disabled name="Teaching_language" id="Teaching_language" class="form-control">
                                        <option >{{$ds["Teaching_language"]}}</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Hình thức học</label>
                                    <select disabled name="study_type" id="study_type" class="form-control">
                                        <option >{{$ds["study_type"]}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Học phí</label>
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <input disabled type="number" class="form-control" placeholder="Nhập học phí" name="Tuition"
                                                id="Tuition" required value="{{$ds["Tuition"]}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <div style="margin-top: 10%">triệu/năm</div>
                                        </div>
                                    </div>

                                    <div style="color:red">
                                        <label id="messages3"></label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-sm-4">
                            <div class="row">

                                <div class="col-sm-10">
                                    <label for="">Điểm chuẩn năm trước</label>
                                    <input disabled type="number" class="form-control" placeholder="Nhập điểm chuẩn" name="benchmark"
                                        id="benchmark" required value="{{$ds["benchmark"]}}">
                                    <div style="color:red">
                                        <label id="messages4"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Loại bằng cấp</label>
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <select disabled name="degree_type" id="degree_type" class="form-control">
                                    
                                                    <option >{{$ds["degree_type"]}}</option>
                                 
                                            </select>
                                        </div>
                                   
                                    </div>

                                    <div style="color:red">
                                        <label id="messages3"></label>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <input disabled type="text" name="countlink" id="countlink" hidden >
                    <input disabled type="text" name="countimg" id="countimg" hidden>


                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Giới thiệu về ngành</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Nhập thông tin"
                                                name="text1" id="text1" 
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{$content["text1"]}}
                                            
                                            </textarea>
                                        </div>

                                    </div>
                         

                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Điểm chuẩn qua từng năm</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Nhập thông tin"
                                                name="text2" id="text2" 
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{$content["text2"]}}
                                            </textarea>
                                        </div>

                                    </div>
                     

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Môi trường học</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Nhập thông tin"
                                                name="text3" id="text3" 
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            
                                                {{$content["text3"]}}
                                            </textarea>
                                        </div>

                                    </div>
                         
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Cơ sở vật chất</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Nhập thông tin"
                                                name="text4" id="text4" 
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{$content["text4"]}}
                                            </textarea>
                                        </div>

                                    </div>
                     

                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row" style="margin-top: 5%">

                        <div class="col">
    
                            <div class="regular slider">
                                @foreach ($link as $item1)
                                    <div align="center" >
                                        <iframe  src="https://www.youtube.com/embed/{{$item1['link']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
    

    
                                @endforeach
    
    
    
                            </div>
    
                        </div>
                    </div>



        
                    <div class="row" style="margin-top: 5%">

                        <div class="col">
    
                            <div class="regular slider">
                                @foreach ($image as $item)
                                    <div align="center" >
                                        <img src="{{ asset('images/imgschoolmajors/' . $item['Image_name']) }}"
                                            style="max-height: 200px;max-width: 250px ">
                                    </div>
    

    
                                @endforeach
    
    
    
                            </div>
    
                        </div>
                    </div>

             







            </div>
        </div>

    </div>









  
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}">



    <script src="{{ asset('slick/slick.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on('ready', function() {



            if ($(window).width() < 438) {
                // Slick carousel
                $('.regular').slick({
                    infinite: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            } else {
                $('.regular').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            }


        });
    </script>




@endsection
