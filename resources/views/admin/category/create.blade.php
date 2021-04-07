@extends('admin.layouts.main')
@section('content')
     <div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Thêm Mới Danh Mục</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.danh-muc.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-12">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.danh-muc.store') }}" method="post" enctype="multipart/form-data">
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
	                                <label>Danh mục cha </label>
	                                <select class="form-control" name="parent_id">
	                                    <option value="0" >-- Chọn --</option>
	                                    @foreach($data as $item)
                                        	<option value="{{ $item->id }}">{{ $item->name }}</option>
                                    	@endforeach
	                                </select>
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Tên danh mục</label>
	                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
                                	<input type="file" id="image" name="image">
	                            </div>

	                            <div class="form-group">
	                                <label>
                                    	<input type="checkbox" value="1" name="is_active"> Trạng thái
                                	</label>
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Vị trí</label>
                  						<select class="form-control" name="position">
	                                    <option value="1" >Danh mục sản phẩm</option>
                                        <option value="0">Danh mục tin tức</option>
	                                </select>
	                            </div>

		                        <div class="form-group">
	                                <label for="exampleInputEmail1">Tiêu đề SEO danh mục</label>
	                                <input type="text" class="form-control" id="meta_title" name="meta_title" >
	                            </div>

	                            <div class="form-group">
	                                <label>Mô tả SEO danh mục</label>
	                                <textarea name="meta_description" class="form-control" rows="3" ></textarea>
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