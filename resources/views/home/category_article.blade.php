@extends('home.layouts.main')
@section('content')
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
<a>{{$cate->name}}</a>
</li>
</ul>
</div>
</div>
</div>
</div>




<div class="container">
<div class="push-up top-equal blocks-spacer">
<div class="row">
 
 
<div class="span12">
<div class="title-area">
<h2 class="inline tagline">Tất cả các bài viết</h2>
</div>
</div>
 
 
 
<section class="span8 blog">
 
 
 @foreach($articles as $item)
<article class="post format-image">
<div class="post-inner">
<div class="post-title">
<h2><a href="{{ route('get.articleDetail', ['slug' => $item->slug, 'id' => $item->id]) }}"><span class="light">{{$item->name}}</span></a></h2>
<div class="metadata"> Ngày viết: 
{{$item->created_at}} /
Tác giả: <a rel="category tag" title="View all posts in aciform">{{$item->user_name}}</a>
</div>
</div>
<p class="push-down-25">{!! $item->summary !!}</p>
<a href="{{ route('get.articleDetail', ['slug' => $item->slug, 'id' => $item->id]) }}" class="btn btn-primary bold higher">Đọc tiếp</a>
</div>
</article>
@endforeach
<hr/>
 
<div class="pagination">
<ul>
<li class="active">{{ $articles->links() }}</li>
</ul>
</div>  
</section>  
 
 
</div>
</div>
</div>  
@endsection