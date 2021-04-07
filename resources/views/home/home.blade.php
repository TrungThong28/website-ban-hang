@extends('home.layouts.main')
@section('content')
<body class="is_home">
<div class="fullwidthbanner-container">
<div class="fullwidthbanner">

<ul>
@if(!empty($banners))
@foreach($banners as $banner)
<li data-transition="premium-random" data-slotamount="3">
<img src="{{asset($banner->image)}}" alt="slider img" width="1400" height="377"/>
<div class="caption lft ltt" data-x="570" data-y="50" data-speed="4000" data-start="1000" data-easing="easeOutElastic">
<img src="webshop/images/dummy/slides/1/baloon1.png" alt="baloon" width="135" height="186"/>
</div>
<div class="caption lft ltt" data-x="770" data-y="60" data-speed="4000" data-start="1200" data-easing="easeOutElastic">
<img src="webshop/images/dummy/slides/1/baloon3.png" alt="baloon" width="40" height="55"/>
</div>
<div class="caption lft ltt" data-x="870" data-y="80" data-speed="4000" data-start="1500" data-easing="easeOutElastic">
<img src="webshop/images/dummy/slides/1/baloon2.png" alt="baloon" width="60" height="83"/>
</div>
</li>
@endforeach
@endif
</ul>


<div class="tp-bannertimer"></div>
</div>


<div id="sliderRevLeft"><i class="icon-chevron-left"></i></div>
<div id="sliderRevRight"><i class="icon-chevron-right"></i></div>
</div>



<div class="container">
<div class="row">
<div class="span12">
<div class="push-up over-slider blocks-spacer">



<div class="row">
<div class="span4">
<a href="#" class="btn btn-block banner">
<span class="title"><span class="light"></span> SẢN PHẨM KHUYẾN MẠI</span>
<em>Giảm từ 10% đến 20%</em>
</a>
</div>
<div class="span4">
<a href="#" class="btn btn-block colored banner">
<span class="title"><span class="light"></span>SẢN PHẨM BÁN CHẠY</span>
<em>Danh sách yêu thích</em>
</a>
</div>
<div class="span4">
<a href="#" class="btn btn-block banner">
<span class="title"><span class="light"></span>SẢN PHẨM MỚI NHẤT</span>
<em>Cập nhật siêu nhanh</em>
</a>
</div>
</div>
</div>
</div>
</div>


<div class="row featured-items blocks-spacer">

 @foreach ($list as $item)
<div class="span12" style="margin-top: 20px">
<div class="main-titles lined">
<h2 class="title"><span class="light">{{$item['category']->name}}</span></h2>
</div>
</div>

<div class="span12">

<div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">

<div class="slide">
<div class="row">

@foreach( $item['products'] as $product )
@if($product->sale > 0)
<div class="span4">
<div class="product">
<div class="product-img featured">
<div class="picture">
<a href="{{route('get.getProduct',['category'=>$product['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}"><img src="{{ asset($product->image ) }}" alt="{{$product->name}}" width="518" height="358"/></a>
<div class="img-overlay">
<a href="{{route('get.getProduct',['category'=>$product['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}" class="btn more btn-primary">Xem thêm</a>
<a href="{{route('get.addCart', $product->id)}}" class="btn buy btn-danger">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles">
<h4 class="title" style="color: red;">{{number_format($product->sale,0,",",".")}} đ <span style="text-decoration-line: line-through; font-size: 15px; color: black">{{number_format($product->price,0,",",".")}} đ</span></h4>
<h5 class="no-margin"><a href="{{route('get.getProduct',['category'=>$item['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}">{{$product->name}}</a></h5>
</div>

</div>
</div>
@else

<div class="span4">
<div class="product">
<div class="product-img featured">
<div class="picture">
<a href="{{route('get.getProduct',['category'=>$product['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}"><img src="{{ asset($product->image ) }}" alt="{{$product->name}}" width="518" height="358"/></a>
<div class="img-overlay">
<a href="{{route('get.getProduct',['category'=>$product['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}" class="btn more btn-primary">Xem thêm</a>

<a href="{{route('get.addCart', $product->id)}}" class="btn buy btn-danger">Thêm vào giỏ</a>

</div>
</div>
</div>
<div class="main-titles">
<h4 class="title">{{number_format($product->price,0,",",".")}} đ</h4>
<h5 class="no-margin"><a href="{{route('get.getProduct',['category'=>$item['category']->slug, 'slug'=>$product->slug, 'id'=>$product->id])}}">{{$product->name}}</a></h5>
</div>
<!-- <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p> -->
</div>
</div>
@endif
@endforeach

</div>
</div>

</div>
</div>
@endforeach
</div>
</div>



<div class="boxed-area blocks-spacer">
<div class="container">

<div class="row">
<div class="span12">
<div class="main-titles lined">
<h2 class="title"><span class="light">Sản Phẩm Nổi Bật</span></h2>
</div>
</div>
</div>


<div class="row popup-products blocks-spacer">
@foreach( $productsHot as $item)
@if($item->sale > 0)
<div class="span3">
<div class="product">
<div class="product-inner">
<div class="stamp green">Sale</div>
<div class="product-img">
<div class="picture">
<a href="{{route('get.getProduct',['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}"><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="540" height="374"/></a>
<div class="img-overlay">
<a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}" class="btn more btn-primary">Xem thêm</a>
<a href="{{route('get.addCart', $product->id)}}" class="btn buy btn-danger">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title" style="color: red;">{{number_format($item->sale,0,",",".")}} đ <span style="text-decoration-line: line-through; font-size: 15px; color: black">{{number_format($item->price,0,",",".")}} đ</span></h4>
<h5 class="no-margin"><a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}">{{ $item->name }}<a></h5>
</div>

<div class="row-fluid hidden-line">
<div class="span6 align-right">
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star"></span>
</div>
</div>
</div>
</div>
</div>
@else
<div class="span3">
<div class="product">
<div class="product-inner">
<div class="product-img">
<div class="picture">
<a href="{{route('get.getProduct',['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}"><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="540" height="374"/></a>
<div class="img-overlay">
<a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}" class="btn more btn-primary">Xem thêm</a>
<a href="{{route('get.addCart', $product->id)}}" class="btn buy btn-danger">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title">{{number_format($item->price,0,",",".")}} đ</h4>
<h5 class="no-margin"><a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}">{{ $item->name }}</a></h5>
</div>

<div class="row-fluid hidden-line">
<div class="span6 align-right">
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
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
</div>



<div class="most-popular blocks-spacer">
<div class="container">

<div class="row">
<div class="span12">
<div class="main-titles lined">
<h2 class="title"><span class="light">Sản Phẩm Khuyến Mại</span></h2>
</div>
</div>
</div>

<div class="row popup-products">
@foreach($productsSale as $item )
<div class="span3">
<div class="product">
<div class="product-inner">
<div class="stamp green">Sale</div>
<div class="product-img">
<div class="picture">
<a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}"><img src="{{ asset($item -> image) }}" alt="{{ $item->name }}" width="540" height="412"/></a>
<div class="img-overlay">
<a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}" class="btn more btn-primary">Xem thêm</a>
<a href="{{route('get.addCart', $product->id)}}" class="btn buy btn-danger">Thêm vào giỏ</a>
</div>
</div>
</div>
<div class="main-titles no-margin">
<h4 class="title" style="color: red;">{{number_format($item->sale,0,",",".")}} đ <span style="text-decoration-line: line-through; font-size: 15px; color: black">{{number_format($item->price,0,",",".")}} đ</span></h4>
<h5 class="no-margin"><a href="{{route('get.getProduct', ['category'=>$item['category']->slug, 'slug'=>$item->slug, 'id'=>$item->id])}}">{{ $item->name }}</a></h5>
</div>
<!-- <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p> -->
<div class="row-fluid hidden-line">
<div class="span6 align-right">
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star stars-clr"></span>
<span class="icon-star"></span>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>



<div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
<div class="container">



<div class="row">
<div class="span12">
<div class="main-titles center-align">
<h2 class="title">
<span class="clickable icon-chevron-left" id="tweetsLeft"></span> &nbsp;&nbsp;&nbsp;
<span class="light"></span> Bài Viết Mới Nhất &nbsp;&nbsp;&nbsp;
<span class="clickable icon-chevron-right" id="tweetsRight"></span>
</h2>
</div>
</div>
</div>

<div class="row">
<div class="span12">
<div class="carouFredSel" data-nav="tweets" data-autoplay="false">

<div class="slide">
<div class="row">
@foreach($articles as $item)
<div class="span6">
<div class="news-item">
<div class="published">{{$item->created_at}}</div>
<h6><a href="{{ route('get.articleDetail', ['slug' => $item->slug, 'id' => $item->id]) }}">{{$item->name}}</a></h6>
<p>{!! $item->summary !!}</p>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="container blocks-spacer-last">
<div class="row">
<div class="span12">
<div class="main-titles lined">
<h2 class="title"><span class="light"></span>Thương Hiệu</h2>
<div class="arrows">
<a class="clickable  icon-chevron-left" id="brandsLeft"></a>
<a class="clickable  icon-chevron-right" id="brandsRight"></a>
</div>
</div>
</div>
</div>

<div class="row">
<div class="span12">	
<div class="brands  carouFredSel" data-nav="brands" data-autoplay="true">
@foreach( $productsBrand as $item)
<img src="{{asset($item->image)}}" alt="" width="203" height="104"/>
@endforeach
</div>
</div>
</div>

</div>
</body>
@endsection
