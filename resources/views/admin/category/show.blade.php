@extends('admin.layouts.main')
@section('content')
	
	<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Danh Mục</h3>
                <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.danh-muc.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td style="width: 50px">Tên danh mục</td>
                      <td>{{ $data -> name }}</td>
                    </tr> 
                    <tr>
                      <td style="width: 50px">Hình ảnh</td>
                      <td><img src="{{ asset($data->image) }}" style="width: 50px"></td>
                    </tr>
                    <tr>
                      <td style="width: 50px">Danh mục cha</td>
                      <td>{{ $data -> parent->name ?? 'Trống' }}</td>
                    </tr> 
                    <tr>
                      <td style="width: 50px">Vị trí</td>
                      <td>{{ $data -> position }}</td>
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