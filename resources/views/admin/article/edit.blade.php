@extends('admin.layouts.main')
@section('content')
<div class="col-md-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Sửa bài viết</h3>
	              <div class="card-tools">
	                <div class="input-group input-group-sm">
	                  <a href="{{ route('quan-tri.tin-tuc.index') }}" class="btn btn-info pull-right"><i class="fa fa-list"> </i> Danh sách</a>
	                </div>
	              </div>
             </div>

          	<div class="col-md-12">
              	<div class="card-body">
                	<div class="box box-primary">
	                    <!-- form start -->
	                  <form role="form" action="{{route('quan-tri.tin-tuc.update', ['id' => $article->id ])}}" method="post" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input value="{{ $article->name }}" type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label>Danh mục bài viết </label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">chọn</option>
                                    @foreach($data as $item)
                                    	<option {{ ($article->parent_id == $item->id)? 'selected' : '' }} value="{{ $item->id }}" > {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input {{ ($article->is_active == 1 ? 'checked':'') }} type="checkbox" value="1" name="is_active"> <b>Hiển thị</b>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10" >{!! $article->summary !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Bài viết</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" >{!! $article->description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề SEO bài viết</label>
                                <input value="{!! $article->meta_title !!}" type="text" class="form-control" id="meta_title" name="meta_title" >
                            </div>

                            <div class="form-group">
                                <label>Mô tả SEO bài viết</label>
                                <textarea name="meta_description" class="form-control" rows="3" > {!! $article->meta_description !!}</textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
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
            var _ckeditor = CKEDITOR.replace('editor1', options);
            _ckeditor.config.height = 500; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor2', options);
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection