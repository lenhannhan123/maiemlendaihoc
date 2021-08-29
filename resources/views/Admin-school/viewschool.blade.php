@extends('layouts.layoutadmin.layout')
@section('title', 'Xem trường')

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

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
    integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
    integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />




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
                        <h3 style="text-align: center">Thông tin của trường</h3>
                    </div>
                </div>
                <div class="row" style="margin-top: 5%">
                    <div class="col-sm-1"></div>
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <label for="">Mã trường</label>
                                <input type="text" class="form-control" placeholder="Nhập mã trường" name="id_school"
                                    id="id_school" readonly value="{{ $school['id_school'] }}">
                            </div>
                        </div>

                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <label for="">Tên trường</label>
                                <input type="text" class="form-control" placeholder="Nhập tên trường" name="name_school"
                                    id="name_school" readonly value="{{ $school['name_school'] }}">


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
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                                    id="address" readonly value="{{ $school['address'] }}">


                            </div>
                        </div>


                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <label for="">Vùng miền</label>
                                <select name="area" id="area" class="form-control" disabled>
                                    <option value="Miền Bắc">{{ $school['area'] }}</option>

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
                                <label for="">Loại trường</label>
                                <br>
                                <select name="School_type" id="School_type" class="form-control" disabled>
                                    <option value="Trung cấp nghề">{{ $school['School_type'] }}</option>

                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <label for="">Website</label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ website" name="website"
                                    id="website" readonly value="{{ $school['website'] }}">


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 5%">

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label style="margin-left:30px">Nhập thông tin giới thiệu</label>
                                <div class="card-body pad">
                                    <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here"
                                            name="School_Introduction" id="School_Introduction" readonly
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $school['School_Introduction'] }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 5%">

                    <div class="col">

                        <div class="row">

                            <div class="col-sm-8">
                                <div>
                                    <label style="margin-left:30px">Logo</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <div>
                                    <img id="imagelogo" style="max-height: 200px"
                                        src="{{ asset('images/logoschool/' . $school['logo']) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" style="margin-top: 5%">

                    <div class="col">

                        <div class="regular slider">
                            @foreach ($schoolimage as $item)
                                <div align="center" >
                                    <img src="{{ asset('/images/imgschool/' . $item['Image_name']) }}"
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
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            }


        });
    </script>







@endsection
