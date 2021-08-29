<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
        <img src="{{ asset('images/demologo.jpg') }}" alt="Product Demo" style="opacity .8;width:100px">

    </a>


    <!-- Quản lý người dùng -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-user"></i>
                    <p>
                        Quản lý người dùng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm quản trị viên</p>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>

    <!-- Quản lý trường-->

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                      Quản lý trường
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('/schoollist')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách trường</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/addschool')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm trường mới</p>
                      </a>
                  </li>

              </ul>
          </li>
      </ul>
  </nav>

  {{-- Quản lý ngành học --}}


  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-user"></i>
                <p>
                    Quản ngành học
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách chuyên nghành </p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/listgroupmajors') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nhóm nghành mẫu</p>
                  </a>
              </li>
                <li class="nav-item">
                    <a href="{{ url('/listmajors') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Chuyên nghành mẫu</p>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>



</aside>
