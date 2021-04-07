@extends('admin.layouts.main')
@section('content')
	<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Sửa thông tin sản phẩm</h3>
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
	                    <form role="form" action="{{ route('quan-tri.san-pham.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
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
	                                <label for="exampleInputEmail1">Tên sản phẩm</label>
	                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"placeholder="Nhập tên sản phẩm">
	                            </div>

	                            <div class="form-group">
	                                <label for="exampleInputFile">Hình ảnh</label>
	                                <input type="file" id="new_image" name="new_image">
	                                <br>
	                                @if ($product->image)
                                       <img src="{{asset($product->image)}}" width="200">
                                    @endif
	                            </div>

	                            <div class="form-group">
                                    <label for="exampleInputFile">Số lượng</label>
                                    <input type="number" class="form-control w-50" id="stock" name="stock" value="{{ $product->stock }}">
                                </div>

                                <div class="row">
	                                <div class="col-lg-6">
	                                    <div class="form-group">
	                                        <label for="exampleInputFile">Giá gốc (vnđ)</label>
	                                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
	                                    </div>
	                                </div>
	                                <!-- /.col-lg-6 -->
	                                <div class="col-lg-6">
	                                    <div class="form-group">
	                                        <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
	                                        <input type="number" class="form-control" id="sale" name="sale" value="{{ $product->sale }}">
	                                    </div>
	                                </div>
	                                <!-- /.col-lg-6 -->
                            	</div>

                            	<div class="form-group" style="margin-top: 10px">
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
	                                    <option value="0">-- chọn Thương Hiệu--</option>
	                                    @foreach($brands as $brand)
	                                        <option {{ ($product->brand_id == $brand->id ? 'selected':'') }} value="{{ $brand->id }}">{{ $brand->name }}</option>
	                                    @endforeach
	                                </select>
                                </div>

                            	<div class="form-group">
	                                <label>Nhà cung cấp</label>
	                                <select class="form-control w-50" name="vendor_id">
	                                    <option value="0">-- chọn NCC --</option>
	                                    @foreach($vendors as $vendor)
	                                        <option {{ ($product->vendor_id == $vendor->id ? 'selected':'') }} value="{{ $vendor->id }}">{{ $vendor->name }}</option>
	                                    @endforeach
	                                </select>
                                </div>

                                <div class="form-group">
	                                <label for="exampleInputEmail1">Mã hàng (SKU)</label>
	                                <input  value="{{ $product->sku }}" type="text" class="form-control w-50" id="sku" name="sku" placeholder="">
                                </div>

	                            <div class="form-group">
	                                <div class="checkbox">
	                                    <label>
	                                        <input {{ ($product->is_active) ? 'checked':'' }} type="checkbox" value="1" name="is_active"> <b>Trạng thái</b>
	                                    </label>
	                                </div>
	                            </div>

                            	<div class="form-group">
	                                <label for="exampleInputEmail1">Vị trí</label>
	                                <input type="number" class="form-control w-50" id="position" name="position" value="{{ $product->position }}">
                            	</div>

                            	<div class="form-group">
	                                <div class="checkbox">
	                                    <label>
	                                        <input {{ ($product->is_hot) ? 'checked':'' }} type="checkbox" value="1" name="is_hot"> <b>Sản phẩm Hot</b>
	                                    </label>
	                                </div>
                            	</div>

                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10" >{!! $product->summary !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" >{!! $product->description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Chi tiết sản phẩm</label>
                                <textarea id="editor3" name="detail" class="form-control" rows="10" >{!! $product->detail !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Chính sách bán hàng</label>
                                <textarea id="editor4" name="policy" class="form-control" rows="10" >{!! $product->policy !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $product->meta_title }}" >
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" rows="3" >{{ $product->meta_description }}</textarea>
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

@section('my_javascript')

<script type="text/javascript">
    $(function () {
        // setup textarea sử dụng plugin CKeditor
        var _ckeditor = CKEDITOR.replace('editor1');
        _ckeditor.config.height = 500; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor2');
        _ckeditor.config.height = 200; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor3');
        _ckeditor.config.height = 500; // thiết lập chiều cao
        var _ckeditor = CKEDITOR.replace('editor4');
        _ckeditor.config.height = 500; // thiết lập chiều cao
	})
</script>
@endsection