@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Thêm mới nhà cung cấp</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.nha-cung-cap.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-6">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.nha-cung-cap.store') }}" method="post" enctype="multipart/form-data">
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
	                                <label for="exampleInputEmail1">Tên nhà cung cấp</label>
	                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhà cung cấp">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Địa chỉ email</label>
	                                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Số điện thoại</label>
	                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
	                            </div>
	                            
	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
                                	<input type="file" id="image" name="image">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Địa chỉ nhà cung cấp</label>
	                                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
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
	                        <!-- /.box-body -->

	                        <div class="box-footer">
	                            <button type="submit" class="btn btn-primary">Thêm mới</button>
	                        </div>
	                    </form>
            		</div>
            		<!-- /.box -->
          
              	</div>
          </div>
        </div>
    </div>
@endsection