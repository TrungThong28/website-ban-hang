@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Thêm Mới Sản Phẩm</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.san-pham.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-12">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                    <form role="form" action="{{ route('quan-tri.san-pham.store') }}" method="post" enctype="multipart/form-data">
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
	                                <label for="exampleInputEmail1">Tên sản phẩm</label>
	                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
	                            </div>
	                            
	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
                                	<input type="file" id="image" name="image">
	                            </div>

	                            <div class="form-group">
	                                <label>Số lượng</label>
                                	<input type="number" class="form-control w-50" id="stock" name="stock" value="1" min="1">
	                            </div>

	                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Giá gốc (vnđ)</label>
                                        <input type="number" class="form-control" id="price" name="price" value="0" min="0">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
                                        <input type="number" class="form-control" id="sale" name="sale" value="0" min="0">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                            	</div>

								<div class="form-group">
                                  <label>Danh mục sản phẩm</label>
                            		<select class="form-control w-50" name="category_id">
                            			@foreach($categories as $category)
                                		<option value="{{$category->id}}">{{$category->name}}</option>
                                		@endforeach
                            		</select>
                            	</div>

                            	<div class="form-group">
	                                <label>Thương hiệu</label>
		                                <select class="form-control w-50" name="brand_id">
		                                	@foreach($brands as $brand)
		                                    <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
		                                   	@endforeach
		                                </select>
                            	</div>

                            	<div class="form-group">
                                  <label>Nhà cung cấp</label>
	                                <select class="form-control w-50" name="vendor_id">
	                                	@foreach($vendors as $vendor)
	                                    <option value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
	                                    @endforeach
	                                </select>
                            	</div>

                            	<div class="form-group">
                               		<label for="exampleInputEmail1">Mã hàng (SKU)</label>
                                	<input type="text" class="form-control w-50" id="sku" name="sku" placeholder="">
                            	</div>

                            	<div class="form-group">
	                                <label for="exampleInputEmail1">Vị trí</label>
                                	<input type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
	                            </div>

	                            <div class="form-group">
	                                <label>
                                    	<input type="checkbox" value="1" name="is_active"> Trạng thái
                                	</label>
	                            </div>
	                            
	                            <div class="form-group">
	                                <div class="checkbox">
	                                    <label>
	                                        <input type="checkbox" value="1" name="is_hot"> <b>Sản phẩm Hot</b>
	                                    </label>
	                                </div>
                            	</div>

	                            <div class="form-group">
	                                <label>Tóm tắt ngắn</label>
	                                <textarea id="editor2" name="summary" class="form-control" rows="10" ></textarea>
	                            </div>

	                            <div class="form-group">
	                                <label>Mô tả</label>
	                                <textarea id="editor1" name="description" class="form-control" rows="10" ></textarea>
	                            </div>

	                            <div class="form-group">
	                                <label>Chi tiết sản phẩm</label>
	                                <textarea id="editor3" name="detail" class="form-control" rows="10" ></textarea>
	                            </div>

	                            <div class="form-group">
	                                <label>Chính sách bán hàng</label>
	                                <textarea id="editor4" name="policy" class="form-control" rows="10" ></textarea>
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Tiêu đề SEO sản phẩm</label>
	                                <input type="text" class="form-control" id="meta_title" name="meta_title" >
	                            </div>
	                            <div class="form-group">
	                                <label>Mô tả SEO sản phẩm</label>
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

@section('my_javascript')

<script type="text/javascript">
    $(function () {
    	var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                ilebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                //filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };

        // setup textarea sử dụng plugin CKeditor
        var _ckeditor = CKEDITOR.replace('editor1');
        _ckeditor.config.height = 500; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor2');
        _ckeditor.config.height = 200; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor3', options);
        _ckeditor.config.height = 500; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor4');
        _ckeditor.config.height = 200; // thiết lập chiều cao
	})
</script>
@endsection