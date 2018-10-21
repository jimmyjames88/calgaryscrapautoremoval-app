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
		<div id="app" class="mt-2">
			<!-- <header>Calgary Scrap Auto Admin</header> -->
			<!-- <div id="sidebar">
				<nav>
					<ul>
						<li>
							<a href="/leads">Leads</a>
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
			@yield('content')
		</div><!-- /app -->
		<script src="/js/app.js"></script>
	</body>
</html>
