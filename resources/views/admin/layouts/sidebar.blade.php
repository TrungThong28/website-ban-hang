
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/quan-tri" class="brand-link">
      <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Quà Tặng Việt</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::check())
          <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <span class="d-block" style="color: #FFFFFF">
            @if(Auth::check())
                {{ Auth::user()->admin_name }}
            @endif
          </span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/quan-tri" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Bảng điều khiển</p>
            </a>
          </li>

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.anh-bia.index') }}"class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>Quản lý ảnh bìa</p>
            </a>
          </li>
          @endhasRole

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.danh-muc.index') }}" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>Quản lý danh mục</p>
            </a>
          </li>
          @endhasRole

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.san-pham.index') }}"class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>Quản lý sản phẩm</p>
            </a>
          </li>
          @endhasRole

           @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.thuong-hieu.index') }}"class="nav-link">
              <i class="nav-icon fab fa-sketch"></i>
              <p>Quản lý thương hiệu</p>
            </a>
          </li>
          @endhasRole

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.nha-cung-cap.index') }}"class="nav-link">
              <i class="nav-icon fa fa-car"></i>
              <p>Quản lý nhà cung cấp</p>
            </a>
          </li>
          @endhasRole

          <li class="nav-item">
            <a href="{{ route('quan-tri.tin-tuc.index') }}"class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Quản lý tin bài viết</p>
            </a>
          </li>

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.khach-hang-thanh-toan.index') }}"class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>Quản lý thông tin đặt hàng</p>
            </a>
          </li>
          @endhasRole

          @hasRole('admin')
          <li class="nav-item">
            <a href="{{ route('quan-tri.nguoi-su-dung.index') }}"class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>Quản lý người sử dụng</p>
            </a>
          </li>
          @endhasRole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>