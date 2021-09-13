@extends('layouts.layoutuser.layout')
@section('Title', 'Home Page')
{{-- Css home --}}

<link rel="stylesheet" href="{{ asset('css/homepage.css') }} ">


@section('content')

    <div class="hero" style="background-image: url('images/hero_1.jpg');">

        <div class="row " style="padding-top: 10%">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center">
                <h3 style="font-weight: bold">Tìm chương trình đào tạo trực tuyến</h3>
                <h4>Hãy để chúng tôi giúp bạn tìm một chương trình phù hợp với bạn</h4>
            </div>
        </div>

        <div class="row SearchBars">

            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row" style="margin-left: 2%">
                                <div class="col">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="col-form-label" >Ngành học</label>
                                        </div>

                                        <div class="col-sm-7" style="margin-left: 8%">
                                            <input type="text" class="form-control" id="majors" name="majors"
                                                placeholder="Bạn muốn học gì?" onkeyup="addmajors()" 
                                                                               onclick="clickk('majors-list')" 
                                                                               onblur ="unclick('majors-list')" 
                                                                           
                                                autocomplete="off">

                                            {{-- <datalist id="majorsname">
                                                @foreach ($group as $item)
                                                        <option >
                                                             {{ $item["name"] }}
                                                        </option>
                                               
                                                        @foreach ($item['major'] as $item1)
                                                            <option>
                                                                {{ $item1["name"] }}
                                                            </option>
                                                        @endforeach

                                                @endforeach
                                             
                                            </datalist> --}}

                                            <div id="majors-list" class="autocomplete-items"  style="display: none">
                                                @foreach ($group as $item)
                                                    <div onclick="adddata('{{ $item['name'] }}','majors')">
                                                        {{ $item['name'] }}
                                                    </div>

                                                    @foreach ($item['major'] as $item1)
                                                        <div onclick="adddata('{{ $item1['name'] }}','majors')">
                                                            {{ $item1['name'] }}
                                                        </div>
                                                    @endforeach

                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Khu vực</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="area" id="area" onchange="changeschool()">
                                                <option value="0">Mặc định</option>
                                                @foreach ( $adress as $item )
                                                    <option value="{{$item["area"]}}">{{$item["area"]}} ({{$item["area_count"]}})</option>
                                                @endforeach
 
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div id="form-advanced" style="display: none;">

                                <div class="row" style="margin-left: 2%; margin-top:2%">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col-sm-5">

                                                <label class="col-form-label">Loại chương trình</label>
                                            </div>
                                            <div class="col-sm-7" >
                                                <select class="form-control"name="programstudy">
                                                    <option value="">Tất cả</option>
                                                    @foreach ( $programstudy as $item )
                                                    <option value="{{$item['ID']}}">{{$item['Program_name']}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Tên trường</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nameschool" name="nameschool"
                                                    placeholder="Nhập tên trường" autocomplete="off"
                                                                               onkeyup="addnameschool()"
                                                                               onclick="clickk('nameschool-list')" 
                                                                               onblur ="unclick2('nameschool-list')" >

                                                    <div id="nameschool-list" class="autocomplete-items"  style="display: none" >
                                                        @foreach ($school as $item)
                                                            <div onclick="adddata('{{ $item['name_school'] }}','nameschool')">
                                                                {{ $item['name_school'] }}
                                                            </div>
 
                                                        @endforeach
        
                                                        
                                                    </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>


                                <div class="row" style="margin-left: 2%; margin-top:2%">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col-sm-5">

                                                <label class="col-form-label">Thời gian học</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="duration">
                                                    <option value="">Tất cả</option>
                                                    @foreach ( $duration as $item )
                                                    <option value="{{$item['duration']}}">{{$item['duration']}} Năm</option>
                                                        
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Tiến độ học</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="Pace">
                                                    <option value="">Tất cả</option>
                                                    <option value="1">Toàn thời gian</option>
                                                    <option value="2">Bán thời gian</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div class="row" style=" margin-top:2%">
                                <div class="col" style="text-align:center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>

                        </form>




                        {{-- Nang cao --}}

                        <div class="row" style="margin-top: 3%">
                            <div class="col" style="text-align: center">

                                <h6 style="font-weight:bold" id="advanced" onclick="advanced()">
                                    Nâng cao
                                    <i class="fas fa-angle-down"></i>
                                    </h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row" style="margin-top: 5% ">
        <div class="col">
            <h2 align="center" style="font-weight: bold">Chưa biết học ngành gì?</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4 align="center">Bạn thử tham khảo những ngành dưới đây xem</h4>
        </div>
    </div>

    <div class="container">


        <div class="row">



            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #006699; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_J col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Ngành luật</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>



            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #6e5a87; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_E col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Khoa học máy tính</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>





            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #aa5d00; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_G col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Kỹ thuật</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>






            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #008040; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_C col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Kiến trúc</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>





            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #2d7f98; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_F col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Nghệ thuật sáng tạo</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>




            <div class="col-sm-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-header" style="background-color: #736e50; color:aliceblue ">
                        <a href="#">
                            <div class="row">

                                <div class="col-sm-1"></div>
                                <div class="cat_D col-sm-2"></div>
                                <div class="col" style="color: white">
                                    <div class="col-form-label" id="title-card-industry">Kinh doanh</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">



                        <a href="#">
                            <div class="row" id="industry-row-1">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="row" id="industry-row">
                                <div class="col">
                                    Luật học
                                </div>
                            </div>
                        </a>


                        <a href="#">
                            <div class="row" id="industry-row-3">
                                <div class="col" style="text-align: right">
                                    Xem tất cả
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>




        </div>
    </div>




    <script>
        function advanced() {
            // document.getElementById('advanced').innerText
        
            if (document.getElementById('advanced').innerText == "Nâng cao ") {
                document.getElementById('advanced').innerHTML = "Thu nhỏ  <i class='fas fa-angle-up'></i>"
                document.getElementById('form-advanced').style.display = "inline";
            } else {
                document.getElementById('advanced').innerHTML = "Nâng cao  <i class='fas fa-angle-down'></i>"
                document.getElementById('form-advanced').style.display = "none";
            }
        }
    </script>
    <script>
        majors = {!! json_encode($group, JSON_HEX_TAG) !!};
        address = {!! json_encode($adress, JSON_HEX_TAG) !!};
        school = {!! json_encode($school, JSON_HEX_TAG) !!};
    
        
    

        console.log(school);

    </script>



    <script src="{{ asset('script/search.js') }}"></script>


@endsection
