<header id="header">
    <div class="darker-row">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="higher-line">
                        Xin chào
                        <a href="#registerModal" role="button" data-toggle="modal">Đăng Ký</a> hoặc
                        <a href="#loginModal" role="button" data-toggle="modal">Đăng Nhập</a>
                    </div>
                </div>
                <div class="span8">
                    <div class="topmost-line">
                        <div class="higher-line">
                            <a href="my-account.html" class="gray-link">Tài Khoản Của Bạn</a>
                            &nbsp; | &nbsp;
                            <a href="my-account.html" class="gray-link">Đăng Xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span7">
                <a class="brand" href="/">
                <img src="/webshop/images/logo.png" alt="Webmarket Logo" width="48" height="48"/>
                <span class="pacifico">Quà Tặng Việt</span>
                <span class="tagline">BỘ QUÀ TẶNG TẾT THƯỢNG HẠNG</span>
                </a>
            </div>
            <div class="span5">
                <div class="top-right">
                    <div class="icons">
                        <a href="http://www.facebook.com/"><span class="zocial-facebook"></span></a>
                        <a href="https://twitter.com/"><span class="zocial-twitter"></span></a>
                        <a href="https://youtube.com/"><span class="zocial-youtube"></span></a>
                        <a href="https://blogger.com/"><span class="zocial-blogger"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar navbar-static-top" id="stickyNavbar">
    <div class="navbar-inner">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <div class="nav-collapse collapse">
                    	<ul class="nav" id="mainNavigation">
                    		
                    		@if(!empty($all_categories))
							@foreach($all_categories as $category)
                    		<li class="dropdown">
							<a href="{{ route('get.categoryProducts', ['slug' => $category->slug]) }}" class="dropdown-toggle">{{$category->name}} <b class="caret"></b> </a>

							<ul class="dropdown-menu">
							@foreach($get_categories as $get_category)

							@if($category->id == $get_category->parent_id)
							<li><a href="{{ route('get.categoryProducts', ['slug' => $get_category->slug]) }}">{{$get_category->name}}</a></li>
							@endif
							@endforeach
							</ul>

							</li>
							@endforeach
							@endif


                            @if(!empty($article_categories))
                            @foreach($article_categories as $cat)
                            <li class="dropdown">
                            <a href="{{ route('get.categoryProducts', ['slug' => $cat->slug]) }}" class="dropdown-toggle">{{$cat->name}} <b class="caret"></b> </a>

                            <ul class="dropdown-menu">
                            @foreach($get_categories as $get_category)

                            @if($cat->id == $get_category->parent_id)
                            <li><a href="{{ route('get.categoryProducts', ['slug' => $get_category->slug]) }}">{{$get_category->name}}</a></li>
                            @endif
                            @endforeach
                            </ul>

                            </li>
                            @endforeach
                            @endif

						</ul>
                        <form class="navbar-form pull-right" action="#" method="get">
                            <button type="submit"><span class="icon-search"></span></button>
                            <input type="text" class="span1" name="search" id="navSearchInput">
                        </form>
                    </div>
                </div>
                
                <div class="span3">
                    <div class="cart-container" id="cartContainer">
                        <div class="cart">
                            <p class="items">Giỏ hàng : <span class="dark-clr">{{ Cart::count() }}</span></p>
                            <p class="dark-clr hidden-tablet">{{ \Cart::subtotal(0) }} đ</p>
                            <a href="{{route('get.listCart')}}" class="btn btn-danger">
                            <i class="icon-shopping-cart"></i>
                            </a>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>