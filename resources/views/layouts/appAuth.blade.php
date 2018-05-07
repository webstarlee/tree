<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Tree of Miami | @yield('title')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!--begin::Web font -->
		<script src="/assets/plugins/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="/assets/plugins/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/css/loader.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="/assets/images/logo/tree_fav_logo.png" />
	</head>
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		{{-- start loading --}}
		<div class="loader-container circle-pulse-multiple">
			<div class="loaders">
				<div id="loading-center-absolute">
					<div class="object" id="object_four"></div>
					<div class="object" id="object_three"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_one"></div>
				</div>
			</div>
		</div>
		{{-- end loading --}}
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url('/assets/images/bg/bg-tree.jpg');">
				<div class="overlay-div" style="position: fixed;width: 100%;height: 100%;z-index: 0;background-color: #000;opacity: 0.5;"></div>
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper" style="z-index: 1;">
					<div class="m-login__container">
						<div class="m-login__logo" style="margin-bottom: 2rem;">
							<a href="javascript:;">
								<img src="/assets/images/logo/tree_logo.png" style="width: 100%;">
							</a>
						</div>
						@yield('content')
					</div>
				</div>
			</div>
		</div>
		<script src="/assets/plugins/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/assets/plugins/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="/js/language.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
        <!--begin::Page Snippets -->
		<script type="text/javascript" src="/js/login.js"></script>
		<script>
			window.onload = function () {
				setTimeout(function () {
					$('.loader-container').fadeOut('slow'); // will first fade out the loading animation
					$('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
					$('body').delay(150).css({'overflow':'visible'});
				}, 500);
			}
		</script>
  </body>
</html>
