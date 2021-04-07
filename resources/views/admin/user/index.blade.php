@extends('admin.layouts.main')
@section('content')
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách người dùng</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <a href="{{ route('quan-tri.nguoi-su-dung.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>  Thêm mới</a>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                </div>
                <!-- /.float-right -->
              </div>

              <div class="table-responsive mailbox-messages">
                    {!! Toastr::message() !!}
                <table class="table table-hover table-striped">
                  <tbody>
                  	<tr>
	                    <th>Họ & Tên</th>
	                    <th>Email</th>
	                    <th>Hình ảnh</th>
	                    <th>Biên tập viên</th>
                      <th>Quản Trị</th>
	                    <th>Trạng thái</th>
                      <th>Đổi quyền</th>
	                    <th class="text-center">Hành động</th>
	                </tr>
	                @foreach($data as $key => $item)
                    <form action="{{route('quan-tri.nguoi-su-dung.cap-nhat')}}" method="POST">
                       @csrf
	                  <tr>
	                    <td>{{ $item->admin_name }}</td>
	                    <td>
                        {{ $item->email }}
                        <input type="hidden" name="email" value="{{ $item->email }}"></td>
                      </td>
	                    <td>
	                    	@if($item->avatar)
	                    		<img src="{{ asset($item->avatar) }}" width="80px">
	                    	@endif
	                    </td>
	                    <td><input type="checkbox" name="author_role" {{$item->hasRole('author') ? 'checked' : ''}}></td>
                      <td><input type="checkbox" name="admin_role"  {{$item->hasRole('admin') ? 'checked' : ''}}></td>
	                    <td>
                        @if($item->is_active == 0)
                            <a href="{{route('nguoi-su-dung.unactive', $item->id)}}"><span>Ẩn</span></a>
                            @else
                            <a href="{{route('nguoi-su-dung.active', $item->id)}}"><span>Kích Hoạt</span></a>
                         @endif
                      </td>
                      <td>
                        <input type="submit" value="Trao quyền" class="btn btn-sm btn-default">
                      </td>
	                    <td class="text-center">
                          <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyUser({{$item->id }})">Xóa</a>
	                    </td>
	                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                
                <div class="float-right">
                  <div class="btn-group">
                    {{ $data->links() }}
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        
@endsection