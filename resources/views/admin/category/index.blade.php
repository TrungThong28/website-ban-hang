@extends('admin.layouts.main')
@section('content')
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách danh mục</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <a href="{{ route('quan-tri.danh-muc.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>  Thêm mới</a>
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
	                    <th>Tên danh mục</th>
	                    <th>Hình ảnh</th>
	                    <th>Danh mục cha</th>
	                    <th>Vị trí</th>
	                    <th>Trạng thái</th>
	                    <th class="text-center">Hành động</th>
	                  </tr>
	                @foreach($data as $key => $item)
	                  <tr>
	                    <td>{{ $item->id }}</td>
	                    <td>{{ $item->name }}</td>
	                    <td>
	                    	@if($item->image)
	                    		<img src="{{ asset($item->image) }}" width="80px">
	                    	@endif
	                    </td>
	                    <td>{{ $item->parent->name ?? 'Trống'}}</td>
	                    <td>{{ $item->position }}</td>
	                    <td>
                         @if($item->is_active == 0)
                            <a href="{{route('unactive', $item->id)}}"><span>Ẩn</span></a>
                            @else
                            <a href="{{route('active', $item->id)}}"><span>Kích Hoạt</span></a>
                         @endif
                      </td>
	                    <td class="text-center">
	                    	<a href="{{route('quan-tri.danh-muc.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                        <a href="{{route('quan-tri.danh-muc.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                          	<!-- <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyCategory( {{ $item->id }})">Xóa</a> -->
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