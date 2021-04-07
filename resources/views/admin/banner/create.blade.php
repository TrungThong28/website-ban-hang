@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Thêm mới ảnh bìa</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.anh-bia.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-12">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.anh-bia.store') }}" method="post" enctype="multipart/form-data">
	                        @csrf
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
	                                <label for="exampleInputEmail1">Tên ảnh bìa</label>
	                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên ảnh bìa">
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
                                	<input type="file" id="image" name="image">
	                            </div>

	                            <div class="form-group">
                                	<label for="exampleInputEmail1">Tùy chỉnh liên kết URL</label>
                                	<input type="text" class="form-control" id="url" name="url" placeholder="Nhập URL">
                            	</div>

                            	<div class="form-group">
                                	<label>Mô tả ảnh bìa</label>
                                	<textarea id="editor1" name="description" class="form-control" rows="3" placeholder="Mô tả ảnh bìa"></textarea>
                            	</div>

	                            <div class="form-group">
	                                <label>
                                    	<input type="checkbox" value="1" name="is_active"> Trạng thái
                                	</label>
	                            </div>
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Vị trí</label>
                                	<input type="text" class="form-control" id="position" name="position" placeholder="Nhập vị trí" value="0">
	                            </div>
	                        </div>

	                        <div class="box-footer">
	                            <button type="submit" class="btn btn-primary">Thêm mới</button>
	                        </div>
	                    </form>
            		</div>

              	</div>
          </div>
        </div>
    </div>
@endsection