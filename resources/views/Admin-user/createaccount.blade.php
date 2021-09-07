<!-- lưu tại /resources/views/user/create.blade.php -->
@extends('layoutAdmin.layout')
@section('title', 'Create Admin Account')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Admin Account</h3>
                    </div>
                    {{-- <div class="card-comment">
                        <p>
                            @if ($message = Session:get('loi'))
                            <div class="alert alert-info alert block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                        </p>
                    </div> --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/postCreate') }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" readonly placeholder="Auto">
                            </div>
                            
                            <div class="form-group">
                                <label for="txtname">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên">
                            </div>

                            <div class="form-group">
                                <label for="txtname">Email</label>
                                <input type="text" class="form-control" id="txt-email" name="email" placeholder="Nhập email">
                            </div>

                            <div class="form-group">
                                <label for="txtname">Password</label>
                                <input type="password" class="form-control" id="txt-password" name="password" placeholder="Nhập mật khẩu">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
    {{-- <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            bsCustomFileInput.init();
        });
    </script> --}}

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
