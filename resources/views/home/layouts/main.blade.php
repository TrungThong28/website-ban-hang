<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
@if(!isset($detail_product))
<title>{{ $productTitle ?? $namePage ?? $articleName ?? $nameCart ?? 'Trang Chủ | Quà Tặng Việt' }}</title>
@endif

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ProteusThemes">
<link rel="canonical" href="{{ URL::current() }}" />
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
<script type="text/javascript">
        WebFontConfig = {
            google : {
                families : ['Open+Sans:400,700,400italic,700italic:latin,latin-ext,cyrillic', 'Pacifico::latin']
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
 
<link href="/webshop/stylesheets/bootstrap.css" rel="stylesheet">
<link href="/webshop/stylesheets/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="/webshop/js/rs-plugin/css/settings.css" type="text/css"/>
<link rel="stylesheet" href="/webshop/js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
<link rel="stylesheet" href="/webshop/js/prettyphoto/css/prettyPhoto.css" type="text/css"/>
<link href="/webshop/stylesheets/main.css" rel="stylesheet">
<script src="/webshop/js/modernizr.custom.56918.js"></script>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/apple-touch/144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/apple-touch/114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/apple-touch/72.png">
<link rel="apple-touch-icon-precomposed" href="/images/apple-touch/57.png">
<link rel="shortcut icon" href="/webshop/images/apple-touch/57.png">
</head>
<body class="
    @if (!isset($detail_product))
        {{ 'detail_product' }}
    @elseif (!isset($category_product))
        {{ 'category_product' }}
    @else
        {{ 'is_home' }}
    @endif
">
<div class="master-wrapper">

<!-- Phan Header -->
@include('home.layouts.header')
 
<!-- Phan Trang chu -->
@yield('content')
 
<!-- Phan Footer -->
@include('home.layouts.footer')

</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "../../../connect.facebook.net/en_US/all.html#xfbml=1&appId=126780447403102";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
 
<script type="text/javascript" src="../../../ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.html"></script>
<script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write('<script src="/webshop/js/jquery.min.js"><\/script>');
    }
</script>
 
<script src="/webshop/js/underscore/underscore-min.js" type="text/javascript"></script>
 
<script src="/webshop/js/bootstrap.min.js" type="text/javascript"></script>
 
<script src="/webshop/js/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="/webshop/js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
 
<script src="/webshop/js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
 
<script src="/webshop/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/webshop/js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>
 
<script src="/webshop/js/isotope/jquery.isotope.min.js" type="text/javascript"></script>
 
<script src="/webshop/js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>
 
<script src="/webshop/js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDvMjN1g49P1MA2Onsj-GulDkmDuuH6aoU&amp;sensor=false"></script>
<script type="text/javascript" src="js/goMap/js/jquery.gomap-1.3.2.min.js"></script>
 
<script src="/webshop/js/custom.js" type="text/javascript"></script>

<script src="/webshop/js/jquery-3.3.1.js" type="text/javascript"></script>
@yield('my_javascript')

</body>

</html>
