@extends('layouts.layoutadmin.layout')
@section('Title', 'Thêm trường mới')

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
                        <h3 style="text-align: center">Thêm thông trường mới</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h6 style="text-align: center;color:red">Vui lòng nhập thông tin trường học vào hệ thống</h6>
                    </div>
                </div>


                <form action="{{ asset('/addschool') }}" style="margin-top: 2%" id="addschool" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Mã trường</label>
                                    <input type="text" class="form-control" placeholder="Nhập mã trường" name="id_school"
                                        id="id_school" onchange="checkid()" required>

                                    <div style="color:red">
                                        <label id="messages1"></label>
                                    </div>

                                </div>
                            </div>
                            <div class="row" id="text-id" style="display: none">

                                <div class="col-sm-8">
                                    <div>
                                        <label style="margin-left:30px; color:red">Mã trường đã tồn tại</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tên trường</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên trường" name="name_school"
                                        id="name_school" required>
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
                                <div class="col-sm-8">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                                        id="address" required>
                                    <div style="color:red">
                                        <label id="messages3"></label>
                                    </div>


                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Vùng miền</label>
                                    <select name="area" id="area" class="form-control">
                                        <option value="Miền Bắc">Miền Bắc</option>
                                        <option value="Miền Trung">Miền Trung</option>
                                        <option value="Miền Nam">Miền Nam</option>
                                        <option value="Nước ngoài">Nước ngoài</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                    <input type="text" hidden class="form-control" name="lat" id="lat">
                    <input type="text" hidden class="form-control" name="lng" id="lng">



                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Loại trường</label>
                                    <br>
                                    <select name="School_type" id="School_type" class="form-control">
                                        <option value="Trung cấp nghề">Trung cấp nghề</option>
                                        <option value="Cao đẳng">Cao đẳng</option>
                                        <option value="Đại học">Đại học</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Website</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ website"
                                        name="website" id="website" required>
                                    <div style="color:red">
                                        <label id="messages4"></label>
                                    </div>

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
                    </div>

                    <div class="row" style="margin-top: 5%">

                        <div class="col">

                            <div class="row">

                                <div class="col-sm-8">
                                    <div>
                                        <label style="margin-left:30px">Thêm Logo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <div>

                                        <input type="file" class="custom-file-input" id="logo" name="logo" multiple>

                                        <label class="custom-file-label" id="logo_label" for="">Choose file</label>
                                        <br>

                                        <br>
                                        <img id="imagelogo" style="max-height: 100px" />
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="text-logo" style="display: none">

                                <div class="col-sm-8">
                                    <div>
                                        <label style="margin-left:30px; color:red">Hình ảnh không hợp lệ hoặc file quá
                                            lớn</label>
                                    </div>
                                </div>
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



                    <input type="text" name="count" id="count" style="display: none">


                    <div class="row" style="margin-top: 5%">

                        <div class="col" style="text-align: center">
                            <input type="button" class="btn btn-primary" id="submit" onclick="checksubmit()"
                                value="Thêm thông tin">

                            <input type="submit" style="display: none" id="nutsubmit">


                        </div>
                    </div>



                    <!-- /.card-header -->




                </form>

                <div id="input11"></div>


            </div>
        </div>

    </div>





    <script id="addfcimage"></script>

    <script>
        // Xử lý logo
        $("#logo").on("change", function() {

            var fileName = $(this).val().split("\\").pop();

            daucham = fileName.lastIndexOf(".");

            size = Number($('#logo')[0].files[0].size);



            duoifile = fileName.slice(daucham + 1, fileName.length);
            duoifile = duoifile.toLowerCase();

            if (((duoifile == "jpg") || (duoifile == "png") || (duoifile == "jpeg")) && (size <= 10485760)) {

                document.getElementById("text-logo").style.display = "none";

                $(this).siblings("#logo_label").addClass("selected").html(fileName);


                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("imagelogo").src = e.target.result;
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);


            } else {
                document.getElementById("text-logo").style.display = "inline";

            }



        });
    </script>



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
        count = 0;
        // Xử lý thêm ảnh của trường
        function addimg() {
            count += 1;
            textt = `
                            <div class="row" style="margin-top: 5%">

                                <div class="col">

                                    <div class="row">

                                        <div class="col-sm-8">
                                            <div>
                                                <label style="margin-left:30px">Thêm ảnh ` + count + `</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <div>

                                                <input type="file" class="custom-file-input" id="schoolimg` + count +
                `" name="schoolimg` + count + `" multiple onchange='  changeimage("schoolimg` + count + `","schoolimg` +
                count + `_text","schoolimg` + count + `_label","schoolimg` + count + `_image")'>

                                                <label class="custom-file-label" id="schoolimg` + count + `_label" for="">Choose file</label>
                                                <br>

                                                <br>
                                                <img id="schoolimg` + count + `_image" style="max-height: 100px" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="schoolimg` + count + `_text" style="display: none">

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

    {{-- Ban do --}}

    <script src="{{ asset('script/googlemap.js') }}"></script>

    <script>
        function checksubmit() {




            if (document.getElementById('id_school').value == "") {
                document.getElementById('messages1').innerText = "Vui lòng nhập mã trường"
            } else {
                document.getElementById('messages1').innerText = ""
            }

            if (document.getElementById('name_school').value == "") {
                document.getElementById('messages2').innerText = "Vui lòng nhập tên trường"
            } else {
                document.getElementById('messages2').innerText = ""
            }

            if (document.getElementById('address').value == "") {
                document.getElementById('messages3').innerText = "Vui lòng nhập địa chỉ"
            } else {
                document.getElementById('messages3').innerText = ""
            }

            if (document.getElementById('website').value == "") {
                document.getElementById('messages4').innerText = "Vui lòng nhập địa chỉ Website"
            } else {
                document.getElementById('messages4').innerText = ""
            }


            document.getElementById("count").value = count;

            diachi = document.getElementById('address').value;

            toado = ConvertAdd(diachi);

            lang = toado.lng;



            document.getElementById('lat').value = toado.lat
            document.getElementById('lng').value = lang


            document.getElementById('nutsubmit').click() = true;


        }
    </script>



    {{-- Check ma truong --}}

    <script>
        ds = {!! json_encode($ds->toArray(), JSON_HEX_TAG) !!};

        function checkid() {
            value = document.getElementById("id_school").value;
            value = value.toUpperCase();

            //  console.log(ds[0]);


            if (ds['data'].length > 0) {
                for (let i = 0; i < ds['data'].length; i++) {

                    if (ds['data'][i]["id_school"] == value) {
                        document.getElementById("text-id").style.display = "inline";
                        document.getElementById('submit').disabled = true;
                        break;

                    } else {
                        document.getElementById("text-id").style.display = "none";
                        document.getElementById('submit').disabled = false;
                    }

                }

            }




            //  ds.forEach(element => {
            //     console.log(element("id_school"));
            //      if(element("id_school") == value){
            //         document.getElementById("text-id").style.display="inline";
            //         document.getElementById('submit').disabled = true;

            //      }
            //  });

        }
    </script>







@endsection
