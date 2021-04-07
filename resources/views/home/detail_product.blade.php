@extends('home.layouts.main')
@section('content')
<body class="detail_product">
<div class="darker-stripe">
<div class="container">
<div class="row">
<div class="span12">
<ul class="breadcrumb">
<li>
<a href="/">Trang chủ</a>
</li>
<li><span class="icon-chevron-right"></span></li>
<li>
<a href="{{route('get.categoryProducts', $category->slug)}}">{{$category->name}}</a>
</li>
<li><span class="icon-chevron-right"></span></li>
<li>
<p style="color: white;">{{$product->name}}</p>
</li>
</ul>
</div>
</div>
</div>
</div>
 
<div class="container">
<div class="push-up top-equal blocks-spacer">
<div class="row blocks-spacer">
<!-- <form action="" class="form form-inline clearfix"> -->
@if($product->sale > 0)
<div class="span5">
<div class="product-preview">
<div class="picture">
<div class="stamp green">Sale</div>
<img src="{{asset($product->image)}}" alt="{{$product->name}}" width="940" height="940" id="mainPreviewImg"/>
</div>
</div>
</div>
@else
<div class="span5">
<div class="product-preview">
<div class="picture">
<img src="{{asset($product->image)}}" alt="{{$product->name}}" width="940" height="940" id="mainPreviewImg"/>
</div>
</div>
</div>
@endif
 
 
 
<div class="span7">
<div class="product-title">
<h1 class="name" style="margin-bottom: 20px"><span class="light">{{$product->name}}</span></h1>
<div class="meta">
@if($product->sale > 0)
<span class="tag" style="margin-bottom: 20px">{{ number_format($product->sale, 0, ",",".") }} đ</span>
@else
<span class="tag" style="margin-bottom: 20px">{{ number_format($product->price, 0, ",",".") }} đ</span>
@endif
</br>
<span class="stock" style="margin-bottom: 20px">
@if($product->stock > 0)
<span class="btn btn-success">Còn hàng</span>
@else
<span class="btn btn-danger">Hết hàng</span>
@endif
</span>
<span class="btn btn-info">Mã sản phẩm: {{$product->sku}}</span>
</div>
</div>
<div class="product-description">
<p>{!! $product->description !!}</p>
<hr/>

<button class="btn btn-danger pull-left"><i class="icon-shopping-cart"></i> &nbsp; <a href="{{route('get.addCart', $product->id)}}" style="color: white;"><b>Thêm vào giỏ</b></a></button>

</div>
</div>
</div>
 
 
 
<div class="row">
<div class="span12">
<ul id="myTab" class="nav nav-tabs">
<li class="active">
<a href="#tab-1" data-toggle="tab">Mô tả sản phẩm</a>
</li>
<li>
<a href="#tab-2" data-toggle="tab">Chính sách bán hàng</a>
</li>
<li>
<a href="#tab-3" data-toggle="tab">Bình luận</a>
</li>
</ul>
<div class="tab-content">
<div class="fade in tab-pane active" id="tab-1">
<p>{!! $product->detail !!}</p>
</div>
<div class="fade tab-pane" id="tab-2">
<p>{!! $product->policy !!}</p>
</div>
<div class="fade tab-pane" id="tab-3">
<p>Sản phẩm này mình rất thích, mong shop sẽ ra nhiều mẫu siêu phẩm hơn nữa</p>
</div>

</div>
</div>
</div>
</div>
</div>  
 
 
 
<div class="boxed-area no-bottom">
<div class="container">
 
<div class="row">
<div class="span12">
<div class="main-titles lined">
<h2 class="title"><span class="light">Sản Phẩm Liên Quan</span></h2>
</div>
</div>
</div>
 
<div class="row popup-products">
 @foreach($relateProducts as $item)
<div class="span3">
<div class="product">
<div class="product-inner">
<div class="product-img">
<div class="picture">
<a href="{{ route('get.getProduct', ['category' => $category->slug , 'slug' => $item->slug , 'id' => $item->id]) }}"><img src="{{asset($item->image)}}" alt="" width="540" height="374"/></a>
<div class="img-overlay">
<a class="btn more btn-primary" href="{{ route('get.getProduct', ['category' => $category->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">Xem thêm</a>
<a href="#" class="btn buy btn-danger">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title">
	@if($item->sale > 0)
	<span class="red-clr">{{number_format($item->sale,0,",",".")}} đ</span>
	<span class="striked" style="font-size: 15px;">{{number_format($item->price,0,",",".")}} đ</span>
	@else 
	<span class="red-clr">{{number_format($item->price,0,",",".")}} đ</span>
	@endif
</h4>
<h5 class="no-margin"><a href="{{ route('get.getProduct', ['category' => $category->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">{{$item->name}}</a></h5>
</div>
<p class="center-align stars">
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star"></span>
</p>
</div>
</div>
</div>  
@endforeach
</div>
</div>
</div>
</body>
@endsection