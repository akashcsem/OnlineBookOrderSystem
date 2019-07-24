
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Books</title>

    @include('public_user.inc.styles')
    <!-- <link rel="stylesheet" href="{{asset('public_user/css/contact-us.css')}}" type="text/css"> -->
    <style>
      body {
          background: url('{{asset('public_user/images/fixed-background.jpg')}}');
          background-attachment: fixed;
          height:100%;
          background-size: cover;
      }
    </style>
  </head>

  <body>
    <div class="bg m-0">
      @include('public_user.inc.header')

      <div class="my-4 py-4">
        <h1 class="text-center display-2 font-weight-bold text-light my-5 py-5">This section will be publish as soon as possible</h1>
      </div>

    </div>

    @include('public_user.inc.footer')

    @include('public_user.inc.scripts')


  </body>
</html>
