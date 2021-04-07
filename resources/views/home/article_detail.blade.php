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
<a>{{$article->name}}</a>
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
<h1 class="inline"><span class="light">{{$article->name}}</span></h1>
</div>
</div>
 
<section class="span8 single single-post">
 
<article class="post format-video">
<div class="post-inner">
<div class="post-title">
<div class="metadata">Ngày viết: 
{{$article->created_at}} /
Tác giả: <a title="View all posts in aciform">{{$article->user_name}}</a>
</div>
</div>
<p>{!! $article->description !!}</p>
</div>
</article>
<hr/>
 
</section>  
   
</div>
</div>
</div>  
@endsection