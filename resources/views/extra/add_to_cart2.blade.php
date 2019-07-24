
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cart Manage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('public_user.inc.styles')

    <link rel="stylesheet" href="/css/app.css">

  </head>

  <body>
    <div class="bg m-0" id="vue-user">
      @include('public_user.inc.header')

      <div class="w-100 py-4" style="background: #EAF8FC">
        <div class="col-md-10 mx-auto">
          <h3>Check in out</h3>
        </div>
      </div>


      <cart-component>

      </cart-component>

      <!-- set progressbar -->
      <vue-progress-bar></vue-progress-bar>

    </div>

    @include('public_user.inc.footer')

    @include('public_user.inc.scripts')
<script src="/js/app.js"></script>

  </body>
</html>
