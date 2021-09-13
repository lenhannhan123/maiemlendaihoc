@extends('layouts.layoutadmin.layout')
@section('title', 'Danh sách chuyên ngành')
<style>
    #tontai {
        display: none;
    }

    #chuanhap {
        display: none;
    }

</style>


@section('content')


    <div class="card">
        <div class="card-header">
            <h4 style="text-align: center">Danh sách chuyên ngành</h4>
            <h6><a href="#" style="text-decoration: none" data-toggle="modal" data-target="#modelDN">Thêm chuyên ngành
                    mới</a></h6>

        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th>ID</th>
                        <th>Tên nhóm ngành</th>
                        <th>Tên chuyên ngành</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($ds as $item)
                            @php
                                $count += 1;
                            @endphp
                            <td>{{ $count }}</td>
                            <td>{{ $item->ID_majors }}</td>
                            <td>

                                @foreach ($groupmajors as $item1)
                                    @if ($item->ID_group_majors == $item1->ID_group_major)
                                        {{ $item1->name }}
                                    @endif
                                @endforeach



                            </td>
                            <td>{{ $item->name }}</td>






                            <td class="project-actions text-center">
                                {{-- {{ route('admin.rental.image', $item->car_id) }} --}}


                                <button class="btn btn-info btn-sm"
                                    onclick="edit('{{ $item->ID_majors }}','{{ $item->name }}','{{ $item->ID_group_majors }}')">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Sửa
                                </button>






                                <a class="btn btn-danger btn-sm"
                                    href="{{ url("/listmajors/delete?id= $item->ID_majors ") }}"
                                    onclick="javascript:return confirm('Bạn có thực sự muốn xóa ?')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Xóa
                                </a>
                            </td>
                            </tr>



                         @endforeach
                    @if ($count == 0)
                        <tr>
                            <td colspan="5">Không có nhóm ngành trong hệ thống</td>
                        </tr>
                    @endif



                </tbody>
            </table>
            <div class="pagination-block" style="float: right; padding-right: 24px">
                {{ $ds->links('Admin-school.layoutpaginationlinks') }}
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- /.card -->



    {{-- Nut DK --}}


    {{-- Form đăng ký --}}


    <div class="modal fade" id="modelDN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 50%">
                <form action="{{ asset('/listmajors/add') }}" method="POST" onsubmit="return checkerror()">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm chuyên ngành mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-6"> <label>Nhập tên chuyên ngành</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập tên chuyên ngành" onchange="checknganh()" id="name"
                                                    name="name">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" id="tontai">
                                    <div></div>
                                    <div class="col">
                                        <label style="color:red">Chuyên nghành này đã tồn tại</label>
                                    </div>
                                </div>
                                <div class="row" id="chuanhap">
                                    <div class="col">
                                        <label style="color:red">Vui lòng nhập Chuyên nghành</label>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-6"> <label>Nhóm ngành</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                                <select name="groupmajors" id="groupmajors" class="form-control">
                                                    @foreach ($groupmajors as $item)
                                                        <option value="{{ $item['ID_group_major'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="#">
                            <button type="submit" id="addgroup" class="btn btn-primary">Thêm chuyên ngành</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editform"></div>

    <button data-toggle="modal" data-target="#formedit" id="btnedit" hidden></button>

    {{-- Form sửa --}}

    <script>
        function edit(id, name, idgroup) {

            groupmajors = {!! json_encode($groupmajors->toArray(), JSON_HEX_TAG) !!};
            str = "";
            for (i = 0; i < groupmajors.length; i++) {
                if (groupmajors[i]["ID_group_major"] == idgroup) {
                    str += `<option name="groupmajors" id="` + groupmajors[i]["ID_group_major"] +
                        `" class="form-control" selected  value="` + groupmajors[i]["ID_group_major"] + `">` + groupmajors[
                            i]["name"] + `</option>`
                } else {
                    str += `<option name="groupmajors" id="` + groupmajors[i]["ID_group_major"] +
                        `" class="form-control" value="` + groupmajors[i]["ID_group_major"] + `">` +
                        groupmajors[i]["name"] + `</option>`
                }
            }


            form =
                `<div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 50%">
                <form action="{{ asset('/listmajors/edit') }}" method="POST" onsubmit="return checkerror1()">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhóm ngành</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-6"> <label>Nhập tên chuyên ngành</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">

                                                <input type="text" class="form-control" placeholder="Nhập tên ngành"
                                                    id="ID_majors" name="ID_majors" value="` + id + `" hidden>
                                                <input type="text" class="form-control" placeholder="Nhập chuyên tên ngành"
                                                    id="name1" name="name1" value="` + name + `">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" id="chuanhap1" hidden>
                                    <div class="col">
                                        <label style="color:red">Vui lòng nhập chuyên nghành</label>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-6"> <label>Nhóm ngành</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                        
                                                <select name="groupmajors" id="groupmajors1" class="form-control">
                                          
                                                    ` + str + `
                                                </select>
                                                   
                                                    
                                                   

                                                

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="#">
                            <button type="submit" id="addgroup" class="btn btn-primary">Sửa nhóm ngành</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>`

            document.getElementById('editform').innerHTML = form;
            document.getElementById('btnedit').click() = true;
        }
    </script>




    <script>
        ds = {!! json_encode($ds->toArray(), JSON_HEX_TAG) !!};

        function checknganh() {



            if (ds['data'].length > 0) {


                text = document.getElementById("name").value.trim().toLowerCase();



                for (i = 0; i < ds['data'].length; i++) {
                    textmau = ds['data'][i]["name"].trim().toLowerCase();



                    if (textmau == text) {
                        document.getElementById("addgroup").disabled = true;
                        document.getElementById("tontai").style.display = "inline";
                        break;


                    } else {
                        document.getElementById("chuanhap").style.display = "none";
                        document.getElementById("addgroup").disabled = false;
                    }
                }
            }

        }

        function checkerror() {

            document.getElementById("name").value = document.getElementById("name").value.trim();
            value = document.getElementById("name").value.trim();

            if (value == "") {

                document.getElementById("chuanhap").style.display = "inline";
                document.getElementById("addgroup").disabled = true;
                return false;
            } else {
                document.getElementById("chuanhap").style.display = "none";
                document.getElementById("addgroup").disabled = false;
                return true;
            }
        }

        function groupmajors(idgroup) {
            alert(idgroup);
        }
    </script>



@endsection
