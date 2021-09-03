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
                        <h3 style="text-align: center">Thêm chuyên ngành mới</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h6 style="text-align: center;color:red">Vui lòng nhập thông tin chuyên ngành vào hệ thống</h6>
                    </div>
                </div>


                <form action="{{ asset('/schoolmajors/add') }}" style="margin-top: 2%" id="addschool" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tên trường</label>
                                    <select name="ID_school" id="ID_school" class="form-control">
                                        @foreach ($school as $item)
                                            <option value="{{ $item['id_school'] }}">{{ $item['name_school'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Nhóm ngành</label>
                                    <select name="ID_group_majors" id="ID_group_majors" class="form-control"
                                        onchange="checkgroup()">
                                        <option value="">Vui lòng chọn nhóm ngành</option>
                                        @foreach ($groupmajors as $item)
                                            <option value="{{ $item['ID_group_major'] }}">{{ $item['name'] }}</option>
                                        @endforeach
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
                                    <select name="ID_majors" id="ID_majors" class="form-control" disabled>
                                        <option value="">Vui lòng chọn chuyên ngành</option>
                                    </select>


                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Loại chương trình</label>
                                    <select name="ID_school_programs" id="ID_school_programs" class="form-control">
                                        @foreach ($program as $item)
                                            <option value="{{ $item['ID'] }}">{{ $item['Program_name'] }}</option>
                                        @endforeach
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
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="Title"
                                        id="Title" required>
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
                                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="description"
                                        id="description" required>
                                    <div style="color:red">
                                        <label id="messages2"></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- word --}}
                    {{-- <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Nhập thông tin giới thiệu</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Place some text here"
                                                name="School_Introduction" id="School_Introduction" required
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>

                                    </div>
                                    <div style="color:red">
                                        <label id="messages5"></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}



                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <label for="">Thời gian học</label>
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <input type="number" class="form-control"  placeholder="Nhập thời gian học" name="duration"
                                                id="duration" required>
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
                                    <select name="Pace" id="Pace" class="form-control">
                                        <option value="Toàn thời gian">Toàn thời gian</option>
                                        <option value="Bán thời gian">Bán thời gian</option>
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
                                    <select name="Teaching_language" id="Teaching_language" class="form-control">
                                        <option value="Tiếng Việt">Tiếng Việt</option>
                                        <option value="Tiếng Anh">Tiếng Anh</option>
                                        <option value="Việt - Anh">Việt - Anh</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Hình thức học</label>
                                    <select name="study_type" id="study_type" class="form-control">
                                        <option value="Học ở trường">Học ở trường</option>
                                        <option value="Học trực tuyến">Học trực tuyến</option>
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

                                            <input type="number" class="form-control" placeholder="Nhập học phí" name="Tuition"
                                                id="Tuition" required>
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
                                    <input type="number" class="form-control" placeholder="Nhập điểm chuẩn" name="benchmark"
                                        id="benchmark" required>
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

                                            <select name="degree_type" id="degree_type" class="form-control">
                                                    <option value="Trung cấp">Trung cấp</option>
                                                    <option value="Cao đẳng">Cao đẳng</option>
                                                    <option value="Đại học">Đại học</option>
                                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                 
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

                    <input type="text" name="countlink" id="countlink" hidden >
                    <input type="text" name="countimg" id="countimg" hidden>


                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label style="margin-left:30px">Giới thiệu về ngành</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Nhập thông tin"
                                                name="text1" id="text1" 
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>

                                    </div>
                     

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 5%">

                        <div class="col">

                            <div style="text-align: center">
                                <label>Thêm link youtube</label>
                            </div>


                            <div id="listlink"></div>

                            <br>

                            <div style="text-align: center">
                                <label id="label_add_img" onclick="return addlink()">Nhấn vào đây để thêm link</label>
                            </div>


                        </div>
                    </div>
                 

            
                    <div class="row" style="margin-top: 5%">

                        <div class="col">

                            <div style="text-align: center">
                                <label>Thêm ảnh của trường</label>
                            </div>


                            <div id="listimage"></div>

                            <br>

                            <div style="text-align: center">
                                <label id="label_add_img" onclick="return addimg()">Nhấn vào đây để thêm ảnh</label>
                            </div>


                        </div>
                    </div>



             

                    <div class="row" style="margin-top: 5%">

                        <div class="col" style="text-align: center">
                            <input type="button" class="btn btn-primary" id="submit" onclick="checksubmit()"
                                value="Thêm thông tin">

                            <input type="submit" style="display: none" id="nutsubmit">


                        </div>
                    </div>



                    <!-- /.card-header -->




                </form>



            </div>
        </div>

    </div>









{{-- Chuyen nganh --}}

    <script>
        majors = {!! json_encode($majors->toArray(), JSON_HEX_TAG) !!};

        function checkgroup() {
            idgroup = document.getElementById("ID_group_majors").value;
            str = "";
            if (idgroup != "") {
                majors.forEach(element => {
                    if (element["ID_group_majors"] == idgroup) {
                        str += `<option value="` + element["ID_majors"] + `">` + element["name"] + `</option>`;
                    }
                });
                document.getElementById("ID_majors").innerHTML = str;
                document.getElementById("ID_majors").disabled = false;
            } else {
                document.getElementById("ID_majors").innerHTML = `<option value="">Vui lòng chọn chuyên ngành</option>`;
                document.getElementById("ID_majors").disabled = true;
            }

        }
    </script>




{{-- Link youtube --}}

    <script>
        count=0;
       function addlink(){
            count+=1;
            str =`
                    <div class="row" style="margin-top: 5%">

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col">
                                    <label style="margin-left:30px">Nhập link `+count+`</label>
                                    <input type="text" class="form-control" placeholder="Nhập link youtube" name="linkyoutube`+count+`"
                                        id="linkyoutube`+count+`" required onchange="addifr('`+count+`')">
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <br>
                            
                            <div class="row" id="ifrdiv`+count+`" style="display:none">
                            
                                <div class="col" style="margin-left:10%">
                                    <iframe width="560" height="315" id="ifr`+count+`" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  
                                </div>
                        
                            </div>
                        </div>
                    </div>`;

                    document.getElementById("listlink").insertAdjacentHTML('beforeend', str)

                    
       }


    </script>

<script>

    function addifr(stt){
      idytb = document.getElementById("linkyoutube"+stt+"").value;

      document.getElementById("ifr"+stt+"").src="https://www.youtube.com/embed/"+idytb;
      document.getElementById("ifrdiv"+stt+"").style.display="inline";
        // https://www.youtube.com/embed/
    }

</script>

{{-- add img --}}
<script>
    function changeimage(i_inp, i_text, i_label, i_image) {

        var fileName = $('#' + i_inp + '').val().split("\\").pop();

        daucham = fileName.lastIndexOf(".");

        size = Number($('#' + i_inp + '')[0].files[0].size);



        duoifile = fileName.slice(daucham + 1, fileName.length);
        duoifile = duoifile.toLowerCase();

        if (((duoifile == "jpg") || (duoifile == "png") || (duoifile == "jpeg")) && (size <= 10485760)) {

            document.getElementById("" + i_text + "").style.display = "none";

            $('#' + i_inp + '').siblings("#" + i_label + "").addClass("selected").html(fileName);


            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("" + i_image + "").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL($('#' + i_inp + '')[0].files[0]);


        } else {
            document.getElementById("" + i_text + "").style.display = "inline";

        }




    }
</script>


<script>
    count1 = 0;
    // Xử lý thêm ảnh của trường
    function addimg() {
        count1 += 1;
        textt = `
                        <div class="row" style="margin-top: 5%">

                            <div class="col">

                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <div>
                                            <label style="margin-left:30px">Thêm ảnh ` + count1 + `</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <div>

                                            <input type="file" class="custom-file-input" id="schoolimg` + count1 +
            `" name="schoolimg` + count1 + `" multiple onchange='  changeimage("schoolimg` + count1 + `","schoolimg` +
            count1 + `_text","schoolimg` + count1 + `_label","schoolimg` + count1 + `_image")'>

                                            <label class="custom-file-label" id="schoolimg` + count1 + `_label" for="">Choose file</label>
                                            <br>

                                            <br>
                                            <img id="schoolimg` + count1 + `_image" style="max-height: 100px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="schoolimg` + count1 + `_text" style="display: none">

                                    <div class="col-sm-8">
                                        <div>
                                            <label style="margin-left:30px; color:red">Hình ảnh không hợp lệ hoặc file quá
                                                lớn</label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            </div>              
        `;

        // document.getElementById("listimage").innerHTML = document.getElementById("listimage").innerHTML +




        document.getElementById("listimage").insertAdjacentHTML('beforeend', textt)



    }
</script>

<script>
    function checksubmit() {




        if (document.getElementById('Title').value == "") {
            document.getElementById('messages1').innerText = "Vui lòng nhập tiêu đề"
        } else {
            document.getElementById('messages1').innerText = ""
        }

        if (document.getElementById('description').value == "") {
            document.getElementById('messages2').innerText = "Vui lòng nhập mô tả"
        } else {
            document.getElementById('messages2').innerText = ""
        }

        if (document.getElementById('Tuition').value == "") {
            document.getElementById('messages3').innerText = "Vui lòng nhập học phí"
        } else {
            document.getElementById('messages3').innerText = ""
        }

        if (document.getElementById('benchmark').value == "") {
            document.getElementById('messages4').innerText = "Vui lòng nhập điểm chuẩn năm trước"
        } else {
            document.getElementById('messages4').innerText = ""
        }

        
        if (document.getElementById('duration').value == "") {
            document.getElementById('messages5').innerText = "Vui lòng nhập thời gian học"
        } else {
            document.getElementById('messages5').innerText = ""
        }

  

        document.getElementById("countlink").value = count;
        document.getElementById("countimg").value = count1;
        document.getElementById('nutsubmit').click() = true;


    }
</script>





@endsection
