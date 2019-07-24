
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('page-title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
		@include('public_user.inc.styles')
    @yield('addition-styles')

  </head>
  <body>
    <!-- navbar-->
    @include('public_user.inc.nav-header')

    {{-- ==========   HEADER END  ======== --}}

    <div id="all">
      <div id="content">

				 @yield('main-content')

      </div>
    </div>


    <!-- *** FOOTER ***   -->
    @include('public_user.inc.footer')
    <!-- *** FOOTER END ***-->



    <!-- JavaScript files-->
  	@include('public_user.inc.scripts')
		@yield('additional_script')
  </body>
</html>
