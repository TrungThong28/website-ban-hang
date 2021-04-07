@extends('home.layouts.main')
@section('content')

<body class=" checkout-page">
<div class="master-wrapper">
<div class="container" style="margin-top: 8px">
<div class="row">
 
 
 
<section class="span12">
<div class="checkout-container">
<div class="row">
<div class="span10 offset1">
 
<header>
<div class="row">
<div class="span2">
</div>
<div class="span6">
<div class="center-align">
<h1><span class="light">Giỏ hàng của bạn</span></h1>
</div>
</div>
</div>
</header>

<table class="table table-items">
<tbody>
	<tr>
		<th style="text-align: center; height: 50px; padding-top: 30px">Hình ảnh</th>
    	<th style="text-align: center; height: 50px; padding-top: 30px">Sản phẩm</th>
    	<th style="text-align: center; height: 50px; padding-top: 30px">Số lượng</th>
    	<th style="text-align: center; height: 50px; padding-top: 30px">Giá bán/ 1 sp</th>
  	</tr>
@foreach($shoppings as $item)
<tr>
<td class="image"><img src="{{ asset( $item->options['image']) }}" alt="" width="124" height="124"/></td>
<td class="desc"> {{$item->name}} &nbsp; <a href="{{ route('get.deleteCart', $item->rowId) }}" class=" btn btn-xs btn-danger"> Xóa</a></td>
<td class="qty" style="width: 120px" >
<form action="{{ route('post.updateCart', $item->rowId) }}" method="POST">
@csrf
<input style="width: 50px" type="number" value="{{$item->qty}}" min="1" name="qty">
<input hidden="" value="{{ $item->id }}" name="name">
<button style="margin-top: 10px" class="btn btn-info">Cập nhật</button>
</form>
</td>
<td style="width: 100px" class="price">
    <p>
        {{number_format($item->price, 0, ",",".")}} đ
    </p>
</td>
</tr>
@endforeach
<td colspan="2" rowspan="2">
</td>
<tr>
<td class="stronger">Tổng tiền:</td>
<td class="stronger">
    <div style="width: 165px" class="size-16 align-right">
        {{ \Cart::subtotal(0) }} đ
    </div>
</td>
</tr>
</tbody>

</table>
<hr/>

<form action="{{route('post.toPay')}}" method="post" class="form-horizontal form-checkout">
@csrf
<div class="control-group">
<label class="control-label" for="firstName">Họ và Tên<span class="red-clr bold"> *</span></label>
<div class="controls">
<input type="text" id="name" class="span4" name="name" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="telephone">Số điện thoại<span class="red-clr bold"> *</span></label>
<div class="controls">
<input type="tel" id="telephone" class="span4" name="phone" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="email">Địa chỉ Email<span class="red-clr bold"> *</span></label>
<div class="controls">
<input type="email" id="email" class="span4" name="email" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="addr1">Địa chỉ nhận hàng<span class="red-clr bold"> *</span></label>
<div class="controls">
<input type="text" id="addr1" class="span4" name="address" required>
</div>
</div>

<div class="control-group">
    <label for="note" class="control-label">Ghi chú</label>
    <div class="controls">
    <textarea type="text" class="span4" rows="5" name="note" id="note" placeholder="Ghi chú"></textarea>
</div>
</div>

<div class="control-group">
    <label for="type" class="control-label">Hình thức thanh toán <span class="red-clr bold"> *</span></label>
    <div class="controls">
    <select required name="type"  class="span4">
        <option value="">-- Chọn một hình thức --</option>
        <option value="Chuyển khoản">Chuyển khoản</option>
        <option value="Tiền mặt">Tiền mặt</option>
    </select>
</div>
</div>

<p class="left-align">
<button class="btn btn-primary higher bold">ĐẶT HÀNG</button>
</p>
</form>

</div>
</div>
</div>
</section>  
</div>
</div>  
</div>  
 
<div id="fb-root"></div>

@endsection