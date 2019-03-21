@extends('frontend.layout.principal')
@section('content')
	<body>


		<a href="{{ route('vph') }}">
			<aside id="colorlib-hero" >
			<div class="flexslider">
				<ul class="slides">
		   	   <!-- <a href="#" target="_blank">-->
			   	<li class="background-imagen-1">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
			   				<div class="col-md-10 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text ">
				   				<div class="slider-text-inner">
				   					<div class="desc" >



									</div>
							   </div>
			   				</div>
			   			</div>
			   		</div>
			   	</li>
			   <!--	</a>-->

			   	</ul>
		  	</div>
		  	</aside>




		</a>


            <div id="colorlib-services" >
			<div class="container" >
				<div class="row">
					<div class="col-md-12 services-wrap" align="center">
						<div class="row">
							<div class="col-md-2 col-sm-3 text-center animate-box fadeInUp animated-fast col-lg-offset-1">
								<a href="{{ route('agenda') }}" class="services">
									<span class="icon">
										<i class="flaticon-stethoscope"></i>
									</span>
									<div class="desc">
										<h3> Agenda <br>tu cita</h3>
									</div>
								</a>
							</div>
							<div class="col-md-2 col-sm-3 text-center animate-box">
								<a href="#" class="services">
									<span class="icon">
										<i class="flaticon-first-aid-kit"></i>
									</span>
									<div class="desc">
										<h3>Servicios <br>y especialidades</h3>
									</div>
								</a>
							</div>
							<div class="col-md-2 col-sm-3 text-center animate-box">
								<a href="#" class="services">
									<span class="icon">
										<i class="flaticon-solidarity"></i>
									</span>
									<div class="desc">
										<h3>colecta <br>pública</h3>
									</div>
								</a>
							</div>
							<div class="col-md-2 col-sm-3 text-center animate-box">
								<a href="https://proa.pe/ong/liga-contra-el-cancer/colecta-publica-2018-1" class="services">
									<span class="icon">
										<i class="flaticon-hands"></i>
									</span>
									<div class="desc">
										<h3>ÚNETE<br>COMO VOLUNTARIO</h3>
									</div>
								</a>
							</div>
							<div class="col-md-2 col-sm-6 text-center animate-box">
								<a href="https://m.me/LigaCancer " class="services">
									<span class="icon">
										<i class="flaticon-donation"></i>
									</span>
									<div class="desc">
										<h3>dona <br>aquí</h3>
									</div>
								</a>
							</div>

							</div>
					</div>
				</div>
			</div>
		</div>

     <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">CAMPAÑAS</h1>
						<h2 style="color: #FF0C39">CAMPAÑAS</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/Camp1.jpg') }}); background-size: 300px 300px;" >
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/Camp2.jpg') }});">
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/Camp3.jpg') }});">
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/Camp4.jpg') }});">
							</div>

						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/Camp5.jpg') }});">
							</div>

						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/campañas/mundialLogo01_2019_enero.png') }});">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-event">
			<div class="container">
				<div class="row">
				<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">BENEFACTORES</h1>
						<h2 style="color: #FF0C39">BENEFACTORES</h2>
					</div>
					<div class="col-md-12 animate-box">
					     <div class="owl-carousel">
							<div class="carousel-item active">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-1.jpg') }}" alt="First slide">
							</div>
						   <div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-2.jpg') }}" alt="Second slide">
							</div>
						    <div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-3.jpg') }}" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-4.jpg') }}" alt="Fourth slide">
							</div>
							<div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-5.jpg') }}" alt="Fifth slide">
							</div>
							<div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-6.jpg') }}" alt="Fifth slide">
							</div>
							<div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-7.jpg') }}" alt="Fifth slide">
							</div>
							<div class="carousel-item">
								<img class="d-block" src="{{ url('liga/images/Aliados/aliados-8.jpg') }}" alt="Fifth slide">
							</div>
						</div>

				</div>
				</div>
			</div>
		</div>
		</div>

@endsection

@section('scritps')
	<!-- Main -->
	<script>
		;(function () {

	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#colorlib-offcanvas, .js-colorlib-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-colorlib-nav-toggle').removeClass('active');

	    	}


	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="colorlib-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle colorlib-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#colorlib-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#colorlib-offcanvas').append(clone2);

		$('#colorlib-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#colorlib-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-colorlib-nav-toggle').removeClass('active');

	    	}
		});
	};

	var burgerMenu = function() {

		$('body').on('click', '.js-colorlib-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};


	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});

				}, 100);

			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){

			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');

			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});

	};


	// Loading page
	var loaderPage = function() {
		$(".colorlib-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};


	var counterWayPoint = function() {
		if ($('#colorlib-counter').length > 0 ) {
			$('#colorlib-counter').waypoint( function( direction ) {

				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	var sliderMain = function() {

	  	$('#colorlib-hero .flexslider').flexslider({
			animation: "fade",

			// easing: "swing",
			// direction: "vertical",
			controlNav: false,
			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	};

	var parallax = function() {

		if ( !isMobile.any() ) {
			$(window).stellar({
				horizontalScrolling: false,
				hideDistantElements: false,
				responsive: true

			});
		}
	};

	// Owl Carousel
	var owlCrouselFeatureSlide = function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			center: true,
			animateOut: 'fadeOut',
		    animateIn: 'fadeIn',
			autoplay: true,
			items: 1,
			autoHeight: true,
		   loop: false,
		   margin: 0,
		   responsive:{
		      0:{
		         items:1
		      },
	         600:{
		         items:2
		      },
		      1000:{
		         items:4
		      }
		   },
		   nav: false,
		   dots: false,
		   autoplayHoverPause: false,
		   mouseDrag: false,
		   smartSpeed: 500,
		   navText: [
		      "<i class='icon-arrow-left3 owl-direction'></i>",
		      "<i class='icon-arrow-right3 owl-direction'></i>"
	     	]
		});
	};


	$(function(){
		mobileMenuOutsideClick();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		sliderMain();
		dropdown();
		goToTop();
		loaderPage();
		counter();
		counterWayPoint();
		parallax();
		owlCrouselFeatureSlide();
	});


}());
	</script>



@endsection


