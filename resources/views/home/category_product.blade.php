@extends('home.layouts.main')
@section('content')

<body class="category_product">
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
<a href="">{{$cate->name}}</a>
</li>
<li><span class="icon-chevron-right"></span></li>
</ul>
</div>
</div>
</div>
</div>
<div class="container">
<div class="push-up blocks-spacer">
<div class="row">
 
 
 
<aside class="span3 left-sidebar" id="tourStep1">
<div class="sidebar-item sidebar-filters" id="sidebarFilters">
 
 
 
<div class="underlined">
<h3><span class="light">Lọc Sản Phẩm Theo</span></h3>
</div>
 
 
 
<div class="accordion-group" id="tourStep2">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" >Thương hiệu</a>
</div>
@if(!empty($brands))
@foreach($brands as $item)
<div id="filterOne" class="accordion-body collapse in">
<div class="accordion-inner">
<a href="" data-target=".filter--accessories" class="selectable"><i class="box"></i> {{$item->name}}</a>
</div>
</div>
@endforeach
@endif
</div>  
 
 
 
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">Giá<b class="caret"></b></a>
</div>
<div id="filterPrices" class="accordion-body in collapse">
<div class="accordion-inner with-slider">
<div class="jqueryui-slider-container">
<div id="pricesRange"></div>
</div>
<input type="text" data-initial="432" class="max-val pull-right" disabled />
<input type="text" data-initial="99" class="min-val" disabled />
</div>
</div>
</div>  


<a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> Xóa tất cả</a>
</div>
</aside>  
 
 
 
<section class="span9">
<div class="underlined push-down-20">
<div class="row">
<div class="span4">
<h3><span class="light"></span>Tất Cả Sản Phẩm</h3>
</div>
<div class="span5 align-right sm-align-left">
<div class="form-inline sorting-by">
<label for="isotopeSorting" class="black-clr">Sắp xếp:</label>
<select id="isotopeSorting" class="span3">
<option value='{"sortBy":"price", "sortAscending":"true"}'>Theo giá (Thấp đến Cao) &uarr;</option>
<option value='{"sortBy":"price", "sortAscending":"false"}'>Theo giá (Cao đến Thấp) &darr;</option>
</select>
</div>
</div>
</div>
</div>  
 
 
 
<div class="row popup-products">
<div id="isotopeContainer" class="isotope-container">
@foreach($products as $item)
@if($item->sale > 0)
<div class="span3 isotope--target filter--bags" data-price="1714" data-popularity="1" data-size="m|l" data-color="green|orange" data-brand="adidas">
<div class="product">
<div class="product-inner">
<div class="stamp green">Sale</div>
<div class="product-img">
<div class="picture">
<a href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}"><img width="540" height="374" alt="" src="{{asset($item->image)}}"/></a>
<div class="img-overlay">
<a class="btn more btn-primary" href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">Xem thêm</a>
<a class="btn buy btn-danger" href="{{route('get.addCart', $item->id)}}">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title" style="color: red;">{{number_format($item->sale,0,",",".")}} đ <span style="text-decoration-line: line-through; font-size: 15px; color: black">{{number_format($item->price,0,",",".")}} đ</span></h4>
<h5 class="no-margin isotope--title"><a href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">{{$item->name}}</a></h5>
</div>
<div class="row-fluid hidden-line">
<div class="span6">
</div>
<div class="span6 align-right">
<span class="icon-star stars-clr"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
</div>
</div>
</div>
</div>
</div>
@else
<div class="span3 isotope--target filter--bags" data-price="1714" data-popularity="1" data-size="m|l" data-color="green|orange" data-brand="adidas">
<div class="product">
<div class="product-inner">
<div class="product-img">
<div class="picture">
<a href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}"><img width="540" height="374" alt="" src="{{asset($item->image)}}"/></a>
<div class="img-overlay">
<a class="btn more btn-primary" href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">Xem thêm</a>
<a class="btn buy btn-danger" href="{{route('get.addCart', $item->id)}}">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title">{{number_format($item->price,0,",",".")}} đ</h4>
<h5 class="no-margin isotope--title"><a href="{{ route('get.getProduct', ['cate' => $cate->slug , 'slug' => $item->slug , 'id' => $item->id]) }}">{{$item->name}}</a></h5>
</div>
<div class="row-fluid hidden-line">
<div class="span6">
</div>
<div class="span6 align-right">
<span class="icon-star stars-clr"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
<span class="icon-star"></span>
</div>
</div>
</div>
</div>
</div>
@endif 
@endforeach
 
</div>
</div>
<hr/>
<div class="pagination">
<ul>
<li class="active">{{ $products->links() }}</li>
</ul>
</div>  
</section>  
</div>
</div>
</div>
</body>
@endsection