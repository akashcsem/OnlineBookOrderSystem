
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Register</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/login/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/login/signup.css')}}">
  </head>
  <body>

    <div class="container">
        <div class="row">
          <div class="login-box col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
            <h3 class="text-center mb-5 mt-2">User Registration</h3>
            <form class="mt-3" method="POST" action="{{ route('register') }}">
                @csrf
              <input title="Type your name" class="mb-4 px-3 text-light" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="User Name">
              @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
              <input title="Type an email" class="mb-4 px-3 text-light" type="text" name="email" placeholder="Email">
              <input title="Type more than 6 character password" class="mb-4 px-3 text-light" type="password" name="password" placeholder="Password">
              <input title="Retype your password" class="mb-4 px-3 text-light" type="password"  name="password_confirmation" required placeholder="Confirm Password">
              <input class="btn btn-block text-light mb-4 mt-3" type="submit" name="" value="Signup">

              <h6 class="text-center">Already have and Account? <a href="{{ route('login') }}">Login Now</a> </h6>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>
