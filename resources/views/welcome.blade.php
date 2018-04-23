<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="keywords" content="" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets -->
	<link rel="stylesheet" href="{{ url('/') }}/files/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/files/css/font-awesome.css">
	<link rel="stylesheet" href="{{ url('/') }}/files/css/style.css">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,700i,800,900" rel="stylesheet">
	  	<!-- scripts -->
	<script src="{{ url('/') }}/files/js/jquery.min.js"></script>
  <script src="{{ url('/') }}/files/js/jquery.vide.min.js"></script>
</head>
<body>
	<div data-vide-bg="{{ url('/') }}/files/video/real2" class="agile-banner">
		<div class="bg-mask">
			<nav class="navbar w3-navbar">
				<div class="navigation-overlay">
					<div class="container-fluid">
						<!--<div class="nav-top">
							<div class="w3-contact">
								<a> <span class="fa fa-volume-control-phone" aria-hidden="true"> </span>+692 527 6524</a>
								<a href="mailto:abcd@yoursite.com"><span class="fa fa-envelope-o" aria-hidden="true" ></span>admin@Real-Estate.com</a>
							</div>
							<div class="w3-socials">
								<ul>
									<li>
										<a href="#"><span class="fa fa-facebook"></span></a>
									</li>
									<li>
										<a href="#"><span class="fa fa-vk"></span></a>
									</li>
									<li>
										<a href="#"><span class="fa fa-pinterest-p"></span></a>
									</li>
									<li>
										<a href="#"><span class="fa fa-twitter"></span></a>
									</li>
								</ul>
							</div>
						</div>-->

						<div class="row">

							<div class="navbar-header">
							  <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  								<span class="sr-only">Toggle navigation</span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
							  </button>-->

							  <!-- Logo -->
							  <div class="logo-container">
  								<div class="logo-wrap">
  								  <a href="#home" class="scroll">
  									{{ config('app.name', 'Laravel') }}
  								  </a>
  								</div>
							  </div>
							</div> <!-- end navbar-header -->


							<div class="col-md-8 col-xs-12 nav-wrap">
								<div class="text-center navbar-collapse w3ls-nav navbar-collapse">

									<ul class="nav navbar-nav w3ls-nav1 text-center">

										<li class="">
											<a href="#home" class="scroll">{{__('messages.Home')}}</a>
										</li>
										<li>
											<a href="#about" class="scroll">{{__('messages.About')}}</a>
										</li>
										<li>
											<a href="#partners" class="scroll">{{__('messages.Partners')}}</a>
										</li>
										<li>
											<a href="#property" class="scroll">{{__('messages.Gallery')}}</a>
										</li>
										<!--<li>
											<a href="#agent" class="scroll">Agents</a>
										</li>-->
										<li>
											<a href="#contact" class="scroll">{{__('messages.Contact')}}</a>
										</li>

									</ul>
								</div>
							</div> <!-- end col -->
						</div> <!-- end row -->
					</div> <!-- end container -->
				</div> <!-- end navigation -->
			</nav> <!-- end navbar -->
      @if (Session::has('flash_message'))
          <div class="container">
              <br>
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get('flash_message') }}
              </div>
          </div>
      @endif
			<div class="heading">
				{!! $home->getContent() !!}
				<a href="#about" class="scroll">{{__('messages.Know More')}}</a>
			</div>

		</div>
	</div>
	<!-- About us -->
	<div class="agile-about" id="about">
		{!! $about->getContent() !!}
	</div>
	<!-- //About us -->
  <!-- Partners -->
	<div class="agile-partner" id="partners">
		<h3 class="center">{{__('messages.Our Partners')}}</h3>
		<div class="container">
      @if($partners)
        @foreach($partners as $partner)
    			<div class="col-md-3 col-sm-3 partner">
    				<img src="{{ url('/') }}/partnerImage/{{ $partner->image }}" class="img-responsive" alt="{{ $partner->name }}">
    				{!! $partner->getDescription() !!}
    			</div>
        @endforeach
      @endif

			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
  <!-- //Partners -->
  <!-- Gallery Property -->
	<div class="w3ls-property" id="property">
		<h3 class="center">{{__('messages.Properties')}}</h3>
		<div class="container">
      @if($properties)
        @foreach($properties as $property)
			<div class="col-md-4 col-sm-4 prop">
				<div data-toggle="modal" data-target="#property{{$property->id}}" class="mask">
				<img src="{{ url('/') }}/propertyImage/{{ $property->cover_image }}" class="img-responsive zoom-img" alt="{{ $property->getName() }}">
				</div>
				<h4 class="pricetag"> {{ $property->price }} </h4>
				<h6>{{ $property->getName() }}</h6>
				<p>{!! $property->getIntroduction() !!}</p>
				<a href="#" data-toggle="modal" data-target="#property{{ $property->id }}">{{__('messages.Know More')}}</a>
					<!-- bootstrap-pop-up -->
					<div class="modal video-modal fade" id="property{{ $property->id }}" tabindex="-1" role="dialog" >
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									{{ $property->getName() }}
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<section>
									<div class="modal-body">
										<img src="{{ url('/') }}/propertyImage/{{ $property->main_image }}" alt=" " class="img-responsive" />
										<h4 class="pricetag"> {{ $property->price }} </h4>
										{!! $property->getDescription() !!}
									</div>
								</section>
							</div>
						</div>
					</div>
				<!-- //bootstrap-pop-up -->
			</div>
        @endforeach
      @endif
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //Gallery Property-->
	<!-- our guides -->
	<!--<div class="w3-guides" id="agent">
		<div class="container">
			<h3 class="text-center">Our Agents</h3>
			<div class="guide-grids">
				<div class="col-md-3 col-sm-6 col-xs-6 guide1">
					<img src="{{ url('/') }}/files/images/g1.jpg" alt="guide1" class="img-responsive">
					<h4>Emily Jean</h4>
					<p class="designation">Senior Agent</p>
					<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there is embarrassing.</p>
					<div class="social-wthree-icons bnragile-icons">
							<ul>
								<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
							</ul>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 guide2">
					<img src="{{ url('/') }}/files/images/g2.jpg" alt="guide2" class="img-responsive">
					<h4>Alexandra Anna</h4>
					<p class="designation">Land Agent</p>
					<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there is embarrassing.</p>
					<div class="social-wthree-icons bnragile-icons">
							<ul>
								<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
							</ul>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 guide3">
					<img src="{{ url('/') }}/files/images/g3.jpg" alt="guide3" class="img-responsive">
					<h4>Mark Phillips</h4>
					<p class="designation">House Agent</p>
					<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there is embarrassing.</p>
					<div class="social-wthree-icons bnragile-icons">
							<ul>
								<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
							</ul>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 guide4">
					<img src="{{ url('/') }}/files/images/g4.jpg" alt="guide4" class="img-responsive">
					<h4>Hail Steinfeld</h4>
					<p class="designation">Loan Agent</p>
					<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there is embarrassing.</p>
					<div class="social-wthree-icons bnragile-icons">
							<ul>
								<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
							</ul>
							<div class="clearfix"> </div>
						</div>
				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>-->
	<!-- //our guides -->
	<!-- testimonials -->

	<!-- //testimonials -->
  <!-- contact -->
	<div class="w3ls-contact" id="contact">
		<h3 class="center">{{__('messages.Contact Us')}}</h3>
		<div class="container">
			<form action="{{ route('contactUs') }}" method="post">
        {{ csrf_field() }}
				<div class="form-input">
					<label>{{__('messages.Name')}} <span class="w3-star"> * </span> </label>
					<input type="text" name="name" placeholder="{{__('messages.Your Name')}}" required>
				</div>
				<div class="form-input">
					<label>{{__('messages.Email')}} <span class="w3-star"> * </span> </label>
					<input type="email" name="email" placeholder="{{__('messages.Your Email')}}" required>
				</div>
				<div class="form-input">
					<label>{{__('messages.Phone')}} <span class="w3-star"> * </span> </label>
					<input type="text" name="phone" placeholder="{{__('messages.Phone Number')}}" required>
				</div>
				<div class="form-textarea">
					<label>{{__('messages.Message')}} <span class="w3-star"> * </span> </label>
					<textarea name="message" placeholder="{{__('messages.Your Message')}}" rows="5" cols="20" required></textarea>
				</div>
				<input type="Submit" value="{{__('messages.Submit Message')}}">
			</form>
			<div class="map">
				{!! $map->getContent() !!}
			</div>
		</div>
			<div class="agile-contact1">
				<div class="container">

					{!! $contact->getContent() !!}
					<h3 class="my-logo"> {{ config('app.name', 'Laravel') }} </h3>

					<div class="footer-icons">
						{!! $social->getContent() !!}
					</div>
				</div>
			</div>
	</div>
  <!-- //contact -->
  <!-- copyright -->
  	 <div class="agileits-w3layouts">
      <div class="container">
        <p>&copy; 2018 {{ config('app.name', 'Laravel') }}. All rights reserved | Powered by <a href="https://www.facebook.com/ahmed.hany.777" target="_blank"><i>Ahmed Hany</i></a></p>
      </div>
	   </div>
	<!-- //copyright -->
  	<!-- scripts -->

	<script src="{{ url('/') }}/files/js/bootstrap.min.js"></script>


	<!-- smooth scrolling -->
	<script src="{{ url('/') }}/files/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/files/js/move-top.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/files/js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
<!-- smooth scrolling -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //scrolling script -->

</body>
</html>
