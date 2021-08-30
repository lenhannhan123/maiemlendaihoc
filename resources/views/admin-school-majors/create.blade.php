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


                <form action="{{ asset('/addschool') }}" style="margin-top: 2%" id="addschool" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row" style="margin-top: 5%">
                        <div class="col-sm-1"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-8">
                                    <label for="">Tên trường</label>
                                    <select name="ID_school " id="ID_school " class="form-control">
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



            </div>
        </div>

    </div>











    <script>
        majors = {!! json_encode($majors->toArray(), JSON_HEX_TAG) !!};

        function checkgroup() {
            idgroup = document.getElementById("ID_group_majors").value;
            str = "";
            if (idgroup!="") {
                majors.forEach(element => {
                    if (element["ID_group_majors"] == idgroup) {
                        str += `<option value="` + element["ID_majors"] + `">` + element["name"] + `</option>`;
                    }
                });
                document.getElementById("ID_majors").innerHTML = str;
                document.getElementById("ID_majors").disabled = false;
            } else{
                document.getElementById("ID_majors").innerHTML = `<option value="">Vui lòng chọn chuyên ngành</option>`;
                document.getElementById("ID_majors").disabled = true;
            }

        }
    </script>











@endsection
