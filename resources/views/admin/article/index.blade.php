@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách bài viết</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <a href="{{ route('quan-tri.tin-tuc.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>  Thêm mới</a>
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
                        <th>Tên bài viết</th>
                        <th>Danh mục cha</th>
                        <th>Bài viết</th>
                        <th>Người viết</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
	                </tr>
	                @foreach($data as $key => $item)
	                 <tr>
	                    <td>{{$key}}</td>
	                    <td>{{ substr($item->name, 0,50 )}}</td>
	                    <td>{{ $item->parent->name ?? 'Trống' }}</td>
	                    <td>{!! substr($item->description, 0, 48) !!}</td>
	                    <td>{{ $item->user_name }}</td>
	                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
	                    <td class="text-center">
	                       <a href="{{route('quan-tri.tin-tuc.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>

	                       <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyArticle({{ $item->id }} )">Xóa</a>
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