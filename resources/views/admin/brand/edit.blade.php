@extends('admin.layouts.main')
@section('content')
	<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Sửa thông tin thương hiệu</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.thuong-hieu.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-6">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.thuong-hieu.update', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
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
	                                <label for="exampleInputEmail1">Tên thương hiệu</label>
	                                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}"placeholder="Nhập tên thương hiệu">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
	                                <input type="file" id="new_image" name="new_image">
	                                <br>
	                                <img src="{{ asset($brand->image) }}" width="200">
	                            </div>
	                            <div class="checkbox">
	                                <label>
	                                  <input {{ ($brand->is_active)? 'checked' : '' }} type="checkbox" value="1" name="is_active" > Trạng thái
	                                </label>
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Vị trí</label>
	                                <input value="{{ $brand->position }}" type="text" class="form-control" id="position" name="position" placeholder="Nhập vị trí">
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