@extends('layouts.layoutadmin.layout')
@section('Title', 'Danh sách trường')



@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách trường học</h3>

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
                  <th style="width: 1%">#</th>
                  <th>ID</th>
                  <th>Tên trường</th>
                  <th>Địa chỉ</th>
                  <th>Loại trường</th>
                  <th>Logo</th>
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
                  <td>{{ $item->id_school}}</td>
                  <td>{{ $item->name_school}}</td>
                  <td>{{ $item->address}}</td>
                  <td>{{ $item->id_school}}</td>
                  <td><img src="{{asset('images/logoschool/'.$item->logo)}}" style="max-height: 50px" alt=""></td>
                  
                
                  
  
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{url("schoollist/view?id={$item->id_school}")}}">
                          <i class="fas fa-folder">
                          </i>
                          Xem
                        </a>
                        {{-- {{ route('admin.rental.image', $item->car_id) }} --}}
                        <a class="btn btn-info btn-sm" href="{{url("schoollist/edit?id={$item->id_school}")}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Sửa
                      </a>
                       <a class="btn btn-danger btn-sm" href="{{url("schoollist/delete?id={$item->id_school}")}}" onclick="javascript:return confirm('Bạn có thực sự muốn xóa ?')">
                          <i class="fas fa-trash">
                          </i>
                          Xóa
                      </a> 
                  </td>
              </tr>
                                   
              @endforeach
          </tbody>
      </table>
      <div class="pagination-block" style="float: right; padding-right: 24px">
        {{ $ds->links('Admin-school.layoutpaginationlinks') }}
      </div>
    </div>
</div>
    <!-- /.card-body -->
  <!-- /.card -->
   



@endsection
