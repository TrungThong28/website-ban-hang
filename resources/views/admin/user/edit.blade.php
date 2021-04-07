@extends('admin.layouts.main')
@section('content')

     <div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Sửa thông tin người dùng</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.nguoi-su-dung.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-12">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.nguoi-su-dung.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
	                        @csrf
	                        @method('PUT')
	                        <div class="box-body">
	                        	@if($errors->any())
	                        	<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
									@foreach($errors->all() as $error)
										<p>{{ $error }}</p>
									@endforeach
								</div>
								@endif
	                            <div class="form-group">
	                                <label>Phân quyền sử dụng </label>
	                                <select class="form-control" name="role_id">
	                                    <option value="1" {{ ($user->admin_id == 1)? 'selected' : '' }} >Biên tập viên</option>
	                                    <option value="2" {{ ($user->admin_id == 2)? 'selected' : '' }} >Quản trị</option>
	                                </select>
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Họ và Tên</label>
	                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Họ và Tên">
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Email</label>
	                                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập Email">
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Mật khẩu</label>
	                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nhập password">
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
	                                <input type="file" id="new_avatar" name="new_avatar">
	                                <br>
	                                <img src="{{ asset($user->avatar) }}" width="250">
	                            </div>
	                            <div class="checkbox">
	                                <label>
	                                    <input type="checkbox" value="1" name="is_active" {{ ($user->is_active == 1)? 'checked' : '' }} > Kích hoạt tài khoản
	                                </label>
	                            </div>
	                        </div>
	                        <!-- /.box-body -->

	                        <div class="box-footer">
	                            <button type="submit" class="btn btn-primary">Cập nhật</button>
	                        </div>
	                    </form>
            		</div>
            		<!-- /.box -->
          
              	</div>
          </div>
        </div>
    </div>
@endsection