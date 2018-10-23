<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="/css/app.css" />
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
				<a class="navbar-brand" href="#">Calgary Scrap Auto Removal</a>
				@if(Auth::check())
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="/admin/leads">
								<i class="fa fa-address-card-o"></i> Leads
							</a>
						</li>
						@if(auth()->user()->hasPermission('manage-testimonials'))
						<li class="nav-item">
							<a class="nav-link" href="/admin/testimonials">
								<i class="fa fa-comment"></i> Testimonials
							</a>
						</li>
						@endif
						@if(auth()->user()->hasPermission('manage-users') || auth()->user()->hasPermission('manage-emails'))
						<li class="nav-item">
							<a class="nav-link" href="/admin/settings">
								<i class="fa fa-cog"></i> Settings
							</a>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="/logout">
								<i class="fa fa-sign-out"></i> Sign out
							</a>
						</li>
					</ul>
				</div>
				@endif
			</nav>



			<!-- <div id="sidebar">
				<nav>
					<ul>
						<li>
							<a href="/admin/leads">Leads</a>
						</li>
					</ul>
				</nav>
			</div> -->
			@hasSection('mobileNav')
			<div class="container mb-4">
				@yield('mobileNav')
			</div>
			@endif
			@if(session()->has('success'))
			<div class="container">
				<div class="alert alert-success">
					<i class="fa fa-check"></i>{{ session()->get('success') }}
				</div>
			</div>
			@endif
			@if(session()->has('error'))
			<div class="container">
				<div class="alert alert-danger">
					<i class="fa fa-close"></i>{{ session()->get('error') }}
				</div>
			</div>
			@endif
			@yield('content')
		</div><!-- /app -->
		<script src="/js/app.js"></script>
	</body>
</html>
