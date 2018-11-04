<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Cache-Control" content="max-age=86400" />
		<meta http-equiv="content-language" content="en-US" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="canonical" href="http://calgaryscrapautoremoval.com/" />
		<meta content="Calgary Scrap Auto Removal Calgary" property="dc:title" />
		<meta property="og:url" content="http://calgaryscrapautoremoval.com/" />
		<meta property="og:site_name" content="Calgary Scrap Auto Removal - Junk Vehicle Recycling" />
		<meta property="og:title" content="Calgary Scrap Auto Removal - Junk Vehicle Recycling" />
		<title>Calgary Scrap Auto Removal - Junk Car Removal &amp; Recycling</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="We pay top dollar for your junk car and tow it away for free. Call us or fill out our online form for a free estimate!">
		<meta name="keywords" content="cash for junk cars calgary, cash for cars calgary, junk car calgary, junk car towing, junk car removal calgary, junk my car calgary">

        <link href="img/assets/favicon.png" rel="icon" type="image/png">
        <link href="css/init.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/colors/green.min.css" rel="stylesheet" type="text/css">
		<link href="css/custom.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:400,100,200,300%7CHind:400,300" rel="stylesheet" type="text/css">
    </head>
    <body data-fade-in="true">

        <div class="pre-loader"><div></div></div>

        <!-- Start Header -->
        <nav class="navbar nav-down" data-fullwidth="true" data-menu-style="transparent" data-animation="hiding"><!-- Styles: light, dark, transparent | Animation: hiding, shrink -->
            <div class="container">

                <div class="navbar-header ">
                    <div class="container">
						<h3 class="pull-right text-right hidden-xs hidden-sm" id="header-phone">
							<strong>
                        		<a href="tel:1+403-991-7717"><i class="fa fa-phone"></i> (403) 991-7717</a>
							</strong>
						</h3>
						<a href="tel:1+403-991-7717" id="header-phone-button" class="btn btn-primary hidden-md hidden-lg">
							<i class="fa fa-phone"></i> Call
						</a>
                        <a class="navbar-brand to-top" href="#" title="Calgary Scrap Auto Removal Homepage"><img src="img/assets/calgary_scrap_auto_removal_logo.png" alt="Calgary Scrap Auto Removal"></a>
						<div class="clearfix"></div>
					</div>
                </div>

            </div>
        </nav>
        <!-- End Header -->

        <!-- Hero Slider -->
        <section id="hero" class="hero-fullwidth slider-fullwidth parallax pt60 pb60" data-overlay-dark="4">
            <div class="container">

				<div class="row">

					<div class="col-md-12 text-center pb20">
						<h2>Cash today for your unwanted junk car<br><strong>Get a FREE Quote</strong></h2>
						<p class="lead">
							Contact us for a free quote and <span class="color">get cash for your junk car today!</span>
							<br /><span class="color">Free towing</span> in <strong>Calgary</strong> and area!
						</p>
					</div>

					<div class="col-md-8 col-md-offset-2 contact box-style">

						<!-- Forms can be functional only on server. Upload to your server when testing. -->
						<form id="contactform" method="post">

							<div class="col-sm-12">
								<input name="name" id="name" placeholder="Name *" required />
							</div>
							<div class="col-sm-6">
								<input name="email" id="email" placeholder="Email *" required />
							</div>
							<div class="col-sm-6">
								<input name="phone" id="phone" placeholder="Phone Number *" required />
							</div>
							<div class="col-sm-12">
								<textarea name="message" rows="9" id="message" placeholder="Vehicle Year/Make/Model/Mileage" required></textarea>
							</div>

							<div class="col-sm-12">
								<input type="submit" class="submit btn btn-lg btn-primary" id="submit" value="Get Quote!"/>
							</div>

						</form>
						<div id="message-info"></div>
					</div>

				</div>


            </div>
        </section>
        <!-- End Hero Slider -->

		@if(count($testimonials))
		<!-- Testimonials -->
        <section id="testimonials" class="parallax pt30 pb80" data-overlay-dark="9">

            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center pb20">
                        <h2><strong>Testimonials</strong></h2>
                    </div>

                    <div class="col-md-12 text-center">

                        <div class="testimonials quote-icons" data-autoplay="false" data-speed="4000">
							@foreach($testimonials->slice(0,5) as $testimonial)
                            <!-- Testimonial -->
                            <div>
                                <p>
                                    <i class="vossen-quote color"></i>
                                    {{ $testimonial->comment }}
                                    <i class="vossen-quote color"></i>
                                </p>
                                <span>{{ $testimonial->name }}</span>
                            </div>
							@endforeach


                        </div>

                    </div>

                </div>

                <p align="center"><a href="#testimonials_all" class="btn btn-lg btn-primary" onclick="$('#testimonials_all').show();">See All Testimonials</a></p>

            </div>
        </section>
        <!-- End Testimonials -->
		@endif

		<section id="testimonials_all" class="pt80 pb90" style="display:none;">
            <div class="container">
                <div class="row">

					@foreach($testimonials as $testimonial)
                    <div class="col-sm-6 feature-left">
                        <i class="fa fa-quote-left back-icon"></i>
                        <div class="feature-left-content">
                            <strong>{{ $testimonial->name }}</strong>
                            <p>{{ $testimonial->comment }}</p>
                        </div>
                    </div>
					@endforeach

                </div>
				<div class="row">
					<div class="col-xs-12 text-center">
						<a href="#hero" class="btn btn-lg btn-primary">Get a Free Quote!</a>
					</div>
				</div>
            </div>
        </section>




        <!-- About Us -->
        <section id="about" class="pt30 pb90">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center pb20">
                        <h2>Calgary Scrap Auto Removal<br><strong>We Pay Cash for Junk Cars</strong></h2>
                        <!-- <p class="lead">Delivering safe and reliable scrap or unwanted vehicle removal services to the Calgary area. Whether an insurance write off or what was once a car, sitting in your driveway annoying you and your neighbors alike; the wise choice for any scrap car owner would be to let that old car be recycled in the scrap yard, and have your pockets lined with cash.</p> -->
                    </div>

                    <div class="col-sm-6 feature-left">
                        <i class="fa fa-dollar size-3x color"></i>
                        <i class="fa fa-dollar back-icon"></i>
                        <div class="feature-left-content">
                            <h4><strong>CASH for Junk vehicles</strong><br>Turn your scrap car in to cash</h4>
                            <p>Delivering safe and reliable scrap or unwanted vehicle removal services to the Calgary area. Whether an insurance write off or what was once a car, sitting in your driveway annoying you and your neighbors alike; the wise choice for any scrap car owner would be to let that old car be recycled in the scrap yard, and have your pockets lined with cash.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 feature-left">
                        <i class="fa fa-leaf size-3x color"></i>
                        <i class="fa fa-leaf back-icon"></i>
                        <div class="feature-left-content">
                            <h4><strong>Eco-Friendly</strong><br>We recycle junk automobiles of all kinds</h4>
                            <p>
								Your car is the largest and most recyclable product you own. No sorting required – the recyclers that work with Calgary Scrap Auto Removal
								will reuse and recycle 80% of your vehicle and will make sure the remaining materials are disposed of responsibly. Responsible recycling
								keeps cars out of landfills and hazardous materials from being released into our air, ground and water.
								<a href="http://retiremyride.com" title="Retire My Ride Calgary Car Recycling">Learn more about Car Recycling in Calgary</a>
							</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End About Us -->



		<!-- Contact Info -->
        <section class="parallax pt30 pb30" data-overlay-dark="9" id="contact">

            <div class="container">
                <div class="row">

                    <div class="col-md-12 details white text-center">
                        <div class="phone-number mb10">
                            <h1 class="bold" style="white-space: nowrap;">
								<a href="tel:1+403-991-7717" class="white">
									(403) 991-7717
								</a>
							</h1>
                        </div>
                        <div class="col-lg-12">
                            <h4><span class="color">Calgary, AB</span></h4>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Contact Info -->





        <!-- Start Footer -->
        <footer id="footer" class="footer style-1 dark">
            <a href="tel:1+403-991-7717"><strong>Calgary Scrap Auto Removal<br />(403) 991-7717</strong></a>
        </footer>
        <!-- End Footer -->

        <script src="js/jquery.js"></script>
        <script src="js/init.min.js"></script>
        <script src="js/scripts.js"></script>

        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-35275777-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<script type="text/javascript">
			/* <![CDATA[ */
			goog_snippet_vars = function() {
			var w = window;
			w.google_conversion_id = 997889760;
			w.google_conversion_label = "8QnJCNmVn3AQ4K3q2wM";
			w.google_remarketing_only = false;
			}
			// DO NOT CHANGE THE CODE BELOW.
			goog_report_conversion = function(url) {
			goog_snippet_vars();
			window.google_conversion_format = "3";
			var opt = new Object();
			opt.onload_callback = function() {
			if (typeof(url) != 'undefined') {
			  window.location = url;
			}
			}
			var conv_handler = window['google_trackConversion'];
			if (typeof(conv_handler) == 'function') {
			conv_handler(opt);
			}
			}
			/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"></script>

    </body>
</html>
