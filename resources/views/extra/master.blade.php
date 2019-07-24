
<!doctype html>
<html lang="bn">
	<head>
		<meta charset = "utf8">
		<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
		<meta name = "viewport" content = "width = device-width initial-scale = 1">
		<link rel="icon" type="image/JPG" href="{{asset('project_images/project_title_image.png')}}"/>

		<title> @yield('page-title') </title>
		@include('public_user.inc.styles')

	</head>

	<body>
		<div id="vue-user" class="bg m-0">

      @yield('header')



      @yield('main-content')

    </div>

      @include('public_user.inc.footer')

      @include('public_user.inc.scripts')

			@yield('additional_script')

	</body>
</html>
