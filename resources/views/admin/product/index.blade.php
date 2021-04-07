@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách sản phẩm</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <a href="{{ route('quan-tri.san-pham.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
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
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá KM</th>
                        <th>Giá gốc</th>
                        <th>SP Hot</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
	                </tr>
	                @foreach($data as $key => $item)
	                  <tr>
	                    <td>{{$key}}</td>
	                    <td>{{ substr($item->name, 0,35 )}}</td>
	                    <td>
	                    	@if($item->image)
	                    		<img src="{{ asset($item->image) }}" width="80px">
	                    	@endif
	                    </td>
	                    <td>{{ $item->stock }}</td>
	                    <td>{{ $item->sale }}</td>
	                    <td>{{ $item->price }}</td>
	                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
	                     <td>
                        @if($item->is_active == 0)
                            <a href="{{route('san-pham.unactive', $item->id)}}"><span>Ẩn</span></a>
                            @else
                            <a href="{{route('san-pham.active', $item->id)}}"><span>Kích Hoạt</span></a>
                         @endif
                      </td>
	                    <td class="text-center">
		                    <a href="{{route('quan-tri.san-pham.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
	                      <a href="{{route('quan-tri.san-pham.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
	                      <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyProduct( {{ $item->id }})">Xóa</a>
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