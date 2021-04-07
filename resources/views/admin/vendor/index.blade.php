@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách nhà cung cấp</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <a href="{{ route('quan-tri.nha-cung-cap.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>  Thêm mới</a>
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
                <table class="table table-hover table-striped">
                  <tbody>
                  	<tr>
                  		<th>STT</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Hình ảnh</th>
                        <th>Địa chỉ</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
	                </tr>
	                @foreach($data as $key => $item)
	                 <tr>
	                    <td>{{$key}}</td>
	                    <td>{{ substr($item->name, 0,50 )}}</td>
	                    <td>{{ substr($item->email, 0,10 )}}</td>
	                    <td>{{ substr($item->phone, 0, 10 )}}</td>
	                    <td>
	                    	@if($item->image)
	                    		<img src="{{ asset($item->image) }}" width="80px">
	                    	@endif
	                    </td>
	                    <td>{{ substr($item->address, 0,30 ) }}</td>
	                    <td>{{ $item->position }}</td>
	                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
	                    <td class="text-center">
	                       <a href="{{route('quan-tri.nha-cung-cap.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>

	                       <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyVendor({{ $item->id }} )">Xóa</a>
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
          </div>
          <!-- /.card -->
        </div>
@endsection