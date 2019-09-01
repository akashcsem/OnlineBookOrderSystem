
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('page-title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->

		@include('public_user.inc.styles')
    @yield('addition-styles')

  </head>
  <body>
    <div id="vue-user">
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




    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    // Tooltips Initialization
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
		@yield('additional_script')
  </body>
</html>
