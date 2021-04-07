<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search"style="width: 230px">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
          @if(Auth::check())
         <img src="{{asset(Auth::user()->avatar)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle" style="width: 32px">
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('dang-xuat') }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body" style="text-align: center">
                <h3 class="dropdown-item-title">
                  <b>Đăng Xuất</b>
                  <span class="float-right text-sm text-danger"></span>
                </h3>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media"> -->
              
              <!-- <div class="media-body">
                <h3 class="dropdown-item-title">
                  Hồ Sơ Quản Trị
                  <span class="float-right text-sm text-muted"></span>
                </h3>
                
              </div> -->
           <!--  </div> -->
            <!-- Message End -->
          <!-- </a> -->
        </div>
      </li>
    </ul>
  </nav>