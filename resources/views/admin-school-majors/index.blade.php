@extends('layouts.layoutadmin.layout')
@section('Title', 'Danh chuyên ngành')



@section('content')


<div class="card">
    <div class="card-header">
        <h4 style="text-align: center">Danh sách chuyên ngành</h4>
        <h6><a href="{{url('/schoolmajors/add')}}" style="text-decoration: none">Thêm chuyên ngành mới</a></h6>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects" style="text-align: center">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th>ID</th>
                  <th>Tiêu đề</th>
                  <th>Nhóm ngành</th>
                  <th>Tên chuyên ngành</th>
                  <th>Tên trường</th>
                  <th>Hành động</th>

              </tr>
          </thead>
      
          <tbody>
              <tr>
                  @php
                      $count=0;
                  @endphp
                @foreach ($ds as $item)
                @php
                      $count+=1;
                  @endphp
                    <td>{{ $count}}</td>
                  <td>{{ $item->ID_school_majors}}</td>
                  <td>{{ $item->Title}}</td>
                  <td>{{ $item->group}}</td>
                  <td>{{ $item->majors}}</td>
                  <td>{{ $item->name_school}}</td>

                 
                  
                
                  
  
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{url("schoolmajors/view?id={$item->ID_school_majors}")}}">
                          <i class="fas fa-folder">
                          </i>
                          Xem
                        </a>
                        {{-- {{ route('admin.rental.image', $item->car_id) }} --}}
                        <a class="btn btn-info btn-sm" href="{{url("schoollist/edit?id={$item->ID_school_majors}")}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Sửa
                      </a>
                       <a class="btn btn-danger btn-sm" href="{{url("schoollist/delete?id={$item->ID_school_majors}")}}" onclick="javascript:return confirm('Bạn có thực sự muốn xóa ?')">
                          <i class="fas fa-trash">
                          </i>
                          Xóa
                      </a> 
                  </td>
              </tr>
                                   
              @endforeach
              @if ($count == 0)
              <tr>
                  <td colspan="7">Không có chuyên ngành trong hệ thống</td>
              </tr>
          @endif
          </tbody>
      </table>
      <div class="pagination-block" style="float: right; padding-right: 24px">
        {{ $ds->links('admin-school-majors.layoutpaginationlinks') }}
      </div>
    </div>
</div>
    <!-- /.card-body -->
  <!-- /.card -->
   



@endsection
