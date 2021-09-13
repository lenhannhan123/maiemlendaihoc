<!-- Lưu tại resources/views/user/index.blade.php -->
@extends('layouts.layoutadmin.layout')
@section('Title', 'Danh sách tài khoản')
@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách tất cả các tài khoản quản trị</h3>
  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" style="text-align: center">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Họ tên</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Ngày tạo</th>
                      <th>Hành động</th>
                     
                  </tr>
              </thead>
              <?php
              $count = 1;
              ?>
                <tbody>
                    @foreach($ds as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->created_at}}</td>

                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="{{ url('admin/update/'.$user->id) }}" >
                                <i class="fas fa-pencil-alt"> Chi tiết </i>
                            </a>
                            @if ($user->user_id != $currentuser_id)
                            <a class="btn btn-danger btn-sm" href="{{ url('admin/delete/'.$user->id) }}" onclick="javascript:return confirm('Are you sure ?')">
                                <i class="fas fa-trash"> Xóa</i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
          <div class="pagination-block" style="float: right; padding-right: 24px">
            {{ $ds->links('Admin-program.layoutpaginationlinks') }}
          </div>
        </div>
    </div>

    @if (session('status'))
    <script>
        let status = {!! json_encode(session('status'), JSON_HEX_TAG) !!};
        alert(status)
    </script>
    @endif


</section>
@endsection

@section('script-section')
    <script>
        $(function(){
            $('#product').DataTable({
                "paging":true,
                "lengthChange":false,
                "searching":false,
                "ordering":true,
                "info":true,
                "autoWidth":false,
            });
        });
    </script>
@endsection