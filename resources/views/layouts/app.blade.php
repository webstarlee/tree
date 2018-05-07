<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.6.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Tree of miami | @yield('title')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!--begin::Web font -->
		{{-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script> --}}
		<script src="/assets/plugins/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="/assets/plugins/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/baseApp/demo4/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/slim/slim.min.css" rel="stylesheet" type="text/css" />
		<link href="/css/loader.css" rel="stylesheet" type="text/css" />
		<link href="/css/wowstyle.css" rel="stylesheet" type="text/css" />
		<link href="/css/frontCustom.css" rel="stylesheet" type="text/css" />
		@yield('custom_css')
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="/assets/images/logo/tree_fav_logo.png" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body style="background-image: url('/assets/images/bg/bg-tree.jpg')"  class="m-page--boxed m-header--static m-aside--offcanvas-default"  >
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
			<!-- begin::Header -->
			<header class="m-grid__item	m-grid m-grid--desktop m-grid--hor-desktop  m-header " >
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--hor-desktop m-container m-container--responsive m-container--xxl">
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-header__wrapper">
						<!-- begin::Brand -->
						<div class="m-grid__item m-brand">
							<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="{{route('dashboard')}}" class="m-brand__logo-wrapper">
										<img alt="" src="/assets/images/logo/tree_logo.png" class="company-main-logo-img" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- begin::Responsive Header Menu Toggler-->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- end::Responsive Header Menu Toggler-->
									<!-- begin::Topbar Toggler-->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!--end::Topbar Toggler-->
								</div>
							</div>
						</div>
						<!-- end::Brand -->
						<!-- begin::Topbar -->
						<div class="m-grid__item m-grid__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__username m--hidden-tablet m--hidden-mobile m--padding-right-15">
													<span class="m-link" style="font-size: 1.3rem;">
														{{Auth::user()->username}}
													</span>
												</span>
												<span class="m-topbar__userpic">
													@if(Auth::user()->avatar == "default.jpg")
														<img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m--img-centered m-{{Auth::user()->unique_id}}-profile-avatar" alt=""/>
													@else
														@if (file_exists('uploads/avatars/'.Auth::user()->unique_id.'/'.Auth::user()->avatar))
															<img src="{{asset('uploads/avatars/'.Auth::user()->unique_id.'/'.Auth::user()->avatar)}}" class="m--img-rounded m--marginless m--img-centered m-{{Auth::user()->unique_id}}-profile-avatar" alt="author">
														@else
															<img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m--img-centered m-{{Auth::user()->unique_id}}-profile-avatar" alt="">
														@endif
													@endif
												</span>
											</a>
											<div class="m-dropdown__wrapper m-masked-dropdown">
												<div class="m-dropdown__inner">
													<?php
						                                $coverimg_url = "";
						                                if (Auth::user()->cover == "default.jpg") {
						                                    $coverimg_url = "/uploads/covers/default.jpg";
						                                } else {
						                                    if (file_exists('uploads/covers/'.Auth::user()->unique_id.'/'.Auth::user()->cover)) {
						                                        $coverimg_url = '/uploads/covers/'.Auth::user()->unique_id.'/'.Auth::user()->cover;
						                                    } else {
						                                        $coverimg_url = "/uploads/covers/default.jpg";
						                                    }
						                                }
						                            ?>
													<div class="m-dropdown__header m--align-center m-{{Auth::user()->unique_id}}-profile-cover" style="background: url({{$coverimg_url}}); background-size: cover;background-repeat: no-repeat;background-position: center;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																@if(Auth::user()->avatar == "default.jpg")
																	<img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m-{{Auth::user()->unique_id}}-profile-avatar" alt=""/>
																@else
																	@if (file_exists('uploads/avatars/'.Auth::user()->unique_id.'/'.Auth::user()->avatar))
																		<img src="{{asset('uploads/avatars/'.Auth::user()->unique_id.'/'.Auth::user()->avatar)}}" class="m--img-rounded m--marginless m-{{Auth::user()->unique_id}}-profile-avatar" alt="author">
																	@else
																		<img src="/uploads/avatars/default.png" class="m--img-rounded m--marginless m-{{Auth::user()->unique_id}}-profile-avatar" alt="">
																	@endif
																@endif
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	{{Auth::user()->first_name}} {{Auth::user()->last_name}}
																</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">
																	{{Auth::user()->email}}
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="{{route('profile')}}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li>
																	<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                        @csrf
                                                                    </form>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- end::Topbar -->
					</div>
				</div>
			</header>
			<!-- end::Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid m-grid--hor m-container m-container--responsive m-container--xxl">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop">
						<div class="m-grid__item m-grid__item--fluid m-wrapper">
							<div class="ifund-slider-container">
								<div id="wowslider-container1">
									<div class="ws_images"><ul>
										<li><img src="/assets/images/trees/slider_1.jpg" alt="slider_1" title="slider_1" id="wows1_0"/></li>
										<li><img src="/assets/images/trees/slider_2.jpg" alt="slider_2" title="slider_2" id="wows1_1"/></li>
										<li><img src="/assets/images/trees/slider_3.jpg" alt="slider_3" title="slider_3" id="wows1_2"/></li>
										<li><img src="/assets/images/trees/slider_4.jpg" alt="slider_4" title="slider_4" id="wows1_3"/></li>
										<li><img src="/assets/images/trees/slider_5.jpg" alt="slider_5" title="slider_5" id="wows1_4"/></li>
										<li><img src="/assets/images/trees/slider_6.jpg" alt="slider_6" title="slider_6" id="wows1_5"/></li>
										<li><img src="/assets/images/trees/slider_7.jpg" alt="slider_7" title="slider_7" id="wows1_6"/></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="m-grid__item m-body__nav">
								<div class="m-stack m-stack--ver m-stack--desktop">
									<!-- begin::Horizontal Menu -->
									<div class="m-stack__item m-stack__item--middle m-stack__item--fluid ifundfilm-nav-flex">
										<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
											<i class="la la-close"></i>
										</button>
										<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
											<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
												<li class="m-menu__item @if(Route::currentRouteName()=='welcome') m-menu__item--active @endif"  aria-haspopup="true">
													<a  href="{{route('welcome')}}" class="m-menu__link ">
														<span class="m-menu__item-here"></span>
														<span class="m-menu__link-text">
															Home
														</span>
													</a>
												</li>
												<li class="m-menu__item @if(Route::currentRouteName()=='tree.info') m-menu__item--active @endif"  aria-haspopup="true">
													<a  href="{{route('tree.info')}}" class="m-menu__link ">
														<span class="m-menu__item-here"></span>
														<span class="m-menu__link-text">
															Infomation
														</span>
													</a>
												</li>
												<li class="m-menu__item @if(Route::currentRouteName()=='favorite') m-menu__item--active @endif"  aria-haspopup="true">
													<a  href="{{route('favorite')}}" class="m-menu__link ">
														<span class="m-menu__item-here"></span>
														<span class="m-menu__link-text">
															Favorite
														</span>
													</a>
												</li>
												{{-- <li class="m-menu__item"  aria-haspopup="true">
													<a  href="{{route('contact')}}" class="m-menu__link ">
														<span class="m-menu__link-text">
															Contact Us
														</span>
													</a>
												</li> --}}
											</ul>
										</div>
									</div>
									<!-- end::Horizontal Menu -->
								</div>
							</div>
							<div class="m-content" style="padding: 50px 25px;">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- begin::Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item	m-footer ">
				<div class="m-container m-container--responsive m-container--xxl">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright" style="font-weight: bold;">
									Copyright &copy; 2018 Tree of Miami
									<a href="#" class="m-link">
										All Rights Reserved
									</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--skin-dark m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="{{route('term')}}" target="_blank" class="m-nav__link">
											<span class="m-nav__link-text">
												Terms & Conditions
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												|
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="{{route('privacy')}}" target="_blank" class="m-nav__link">
											<span class="m-nav__link-text">
												Privacy Policy - Legal
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
    	<!--begin::Base Scripts -->
		<script src="/assets/plugins/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/assets/plugins/baseApp/demo4/scripts.bundle.js" type="text/javascript"></script>
		<script src="/assets/plugins/slim/slim.kickstart.min.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<script type="text/javascript" src="/js/wowslider.js"></script>
		<script type="text/javascript" src="/js/wowscript.js"></script>
		@yield('custom_js')
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
	<!-- end::Body -->
</html>
