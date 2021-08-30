@extends('layouts.layoutadmin.layout')
@section('title', 'Danh sách chương trình học')
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
            <h4 style="text-align: center">Danh sách chương trình học</h4>
            <h6><a href="#" style="text-decoration: none" data-toggle="modal" data-target="#modelDN">Thêm chương trình học mới</a></h6>

        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th>ID</th>
                        <th>Tên chương trình</th>
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
                            <td>{{ $item->ID}}</td>
                            <td>{{ $item->Program_name }}</td>






                            <td class="project-actions text-center">
                                {{-- {{ route('admin.rental.image', $item->car_id) }} --}}
                                <button class="btn btn-info btn-sm" onclick="edit('{{ $item->ID }}','{{ $item->Program_name }}')" >
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Sửa
                                </button>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ url("/program/delete?id={$item->ID}") }}"
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
                            <td colspan="4">Không có chương trình học trong hệ thống</td>
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


    <div class="modal fade" id="modelDN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 50%">
                <form action="/program/add" method="POST" onsubmit="return checkerror()">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm chương trình mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5"> <label>Nhập tên chương trình</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Nhập tên chương trình"
                                                    onchange="checknganh()" id="name" name="Program_name">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" id="tontai">
                                    <div></div>
                                    <div class="col">
                                        <label style="color:red">Tên chương trình này đã tồn tại</label>
                                    </div>
                                </div>
                                <div class="row" id="chuanhap">
                                    <div class="col">
                                        <label style="color:red">Vui lòng tên chương trình học</label>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="#">
                            <button type="submit" id="addgroup" class="btn btn-primary">Thêm chương trình học</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editform"></div>

    <button  data-toggle="modal" data-target="#formedit" id="btnedit" hidden></button>

    {{-- Form sửa --}}

    <script>

        function edit(id,name){

  

            form =`<div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 50%">
                <form action="/program/edit" method="POST" onsubmit="return checkerror1()">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chương trình học</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <br>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5"> <label>Nhập tên chương trình</label></div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" hidden id="ID_group_major" value="`+id+`" name="ID_program">
                                                <input type="text" class="form-control" placeholder="Nhập tên ngành"  value="`+name+`"
                                                    id="name1" name="name1">
                                            </div>
                                        </div>
                                        <div class="row" style="display:none" id="chuanhap1">
                                            <div class="col">
                                                <label style="color:red">Vui lòng nhập nhóm nghành</label>
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
                            <button type="submit" id="addgroup" class="btn btn-primary">Sửa chuyên ngành</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>`

             document.getElementById('editform').innerHTML=form;
             document.getElementById('btnedit').click()=true;
        }


    </script>




    <script>
        ds = {!! json_encode($ds->toArray(), JSON_HEX_TAG) !!};

        function checknganh() {

            
            
            if (ds['data'].length > 0) {
                

                text = document.getElementById("name").value.trim().toLowerCase();
                    
                    

                for (i = 0; i < ds['data'].length; i++) {
                    textmau = ds['data'][i]["Program_name"].trim().toLowerCase();
                    
                   

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
    </script>



@endsection
