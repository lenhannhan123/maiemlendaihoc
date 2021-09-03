@extends('layouts.layoutadmin.layout')
@section('Title', 'Danh sách blog')



@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách blog</h3>

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
                  <th style="width: 10%">Tiêu đề</th>
                  <th style="width: 30%">Nội dung</th>
                  <th style="width: 20%">Hình ảnh</th>
                  <th style="width: 15%">Ngày đăng</th>
                  <th></th>

              </tr>
          </thead>
      
          <tbody>
              <tr>
                  @php
                      $count=0;
                  @endphp
                @foreach ($data as $item)
                @php
                      $count+=1;
                @endphp
                  <td>{{ $count }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->content }}</td>
                  <td>
                      <img src="../images/blog/{{ $item->thumbnail }}" alt="" style="width: 100%">
                  </td>
                  <td>{{ $item->created_at }}</td>

                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{ url('admin/blog/view/' . $item->id_blog) }}">
                          <i class="fas fa-folder">
                          </i>
                          Xem
                        </a>
                        {{-- {{ route('admin.rental.image', $item->car_id) }} --}}
                        <a class="btn btn-info btn-sm" href="{{ url('admin/blog/update/' . $item->id_blog) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Sửa
                      </a>
                       <a class="btn btn-danger btn-sm" href="{{ url('admin/blog/delete/' . $item->id_blog) }}" onclick="javascript:return confirm('Bạn có thực sự muốn xóa ?')">
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
        {{ $data->links('Admin-school.layoutpaginationlinks') }}
      </div>
    </div>
</div>
    <!-- /.card-body -->
  <!-- /.card -->
   

@endsection