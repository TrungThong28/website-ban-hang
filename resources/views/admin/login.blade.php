<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập vào hệ thống quản trị</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Image favicon -->
  <link rel="shortcut icon" href="/webshop/images/apple-touch/57.png">
</head>
<body class="hold-transition login-page" style="height: 500px">
<div class="login-box">
  <div class="login-logo">
    <b>Hệ thống quản trị Quà Tặng Việt </b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="{{ route('gui-dang-nhap') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Nhập email">
          <div class="input-group-append">
            @if($errors->has('email'))
                    <span class="invalid-feedback" role="alert" style="color: red">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
          <div class="input-group-append">
            @if($errors->has('password'))
                    <span class="invalid-feedback" role="alert" style="color: red">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>
          @if(session('msg'))
                <div class="form-group has-feedback"><a href="">{{ session('msg') }}</a></div>
          @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ghi nhớ
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="width: 99px">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a>Bạn quên mật khẩu</a>
      </p>
      </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>

</body>
</html>
