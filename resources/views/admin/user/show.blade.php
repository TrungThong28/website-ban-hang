@extends('admin.layouts.main')
@section('content')
	
	<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin người dùng</h3>
                <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.nguoi-su-dung.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td style="width: 50px">Họ và Tên</td>
                      <td>{{ $data -> name }}</td>
                    </tr> 
                    <tr>
                      <td style="width: 50px">Hình ảnh</td>
                      <td><img src="{{ asset($data -> avatar) }}" style="width: 50px"></td>
                    </tr>
                    <tr>
                      <td style="width: 50px">Email người dùng</td>
                      <td>{{ $data -> email }}</td>
                    </tr> 
                    <tr>
                      <td style="width: 50px">Phân quyền</td>
                      <td>
                        @if($data -> admin_id == 1)
                            Biên tập viên
                            @else Quản trị
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 50px">Trạng thái</td>
                      <td style="width: 50px">
                      	@if($data -> is_active == 0)
                      		Ẩn
                      		@else Hiển thị
                      	@endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
          <!-- /.col -->
        </div>
    </div>

@endsection