
<button onclick="topFunction()" id="scrollButton" title="Go to top"><img src="{!! asset('project_images/arrow_up.png') !!}" style="height: 50px; width: 40px;" alt="Company Logo">
</i></button>

<div  class="bg-nav sticky-top">
  <div class="col-md-10 mx-auto p-0 m-0 clearfix">
    <div class="row  mx-0 px-0 pt-1 pb-0">

    <div class="company-logo px-0 mx-0 my-auto ml-2 col-md-2">
      <a href="#">
        <img src="{!! asset('project_images/project_logo.png') !!}" style="height: 50px; width: 80px;" alt="Company Logo">
      </a>
      <span class="text-light font-weight-bold pl-3" style="letter-spacing: 3px; font-size: 18px;">Soptoborno</span>
    </div>

    <div class="col-md-7 mx-auto px-0 my-auto">

      <div class="top_search float-right">
        <form class="">
          @csrf
          <input type="text" value=""  name="search" class="from-controls search" placeholder="Search here...."  required/>
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <!-- /.top_search -->
      <!-- searchbar end -->

    </div>


    <div class="short-contact px-0 mx-0 my-0 py-0 col-md-2 ml-auto">
      <h6 class="float-right mr-3 mt-1 text-light">01975-759282</h6> <br><br>
      <h6 class="float-right mr-0 pr-0" style="margin-top:-25px;">
      <span class="ml-auto">
        <a class="navbar-brand text-right text-light" href="dashboard.php" style="font-size:14px;">Order</a>
      </span>
      <span class="ml-auto float-right">
        <a class="navbar-brand text-light" href="login.html" style="font-size:14px;">Login </a>
      </span> </h6>
    </div>
    <!-- Checkout Basket -->
    <div class="">
      <a href="{{ route('product.shoppingCart')}}" data-toggle="tooltip" title="Checkout Book">
        {{-- <span class="notify-badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span> --}}
        <span class="notify-badge">
          @php
            $cartTotal = 0;
          @endphp
          @foreach ($cartProducts as $cartProduct)
            @php
              $cartTotal += $cartProduct->qty;
            @endphp
          @endforeach
          @php
            echo $cartTotal;
          @endphp
        </span>
        <img src="{!! asset('project_images/checkout_basket.png') !!}" width="70" height="70" alt="Checkout">
      </a>
    </div>
  </div>

  <!-- Navigation Bar -->
  <nav class="topmenu navbar navbar-expand-md bg-nav navbar-dark navbar-fixed-top mx-auto px-0" style="height:50px;">
    <!-- Brand -->
    <a class="navbar-brand pl-3" href="{{ url('/') }}">Home</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse bg-nav" id="collapsibleNavbar">
      <ul class="navbar-nav pl-3">

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/writer') }}">Writer</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{!! asset('/list_of_publications.html') !!}"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{!! asset('/list_of_books') !!}">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/novels') }}">Novels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{!! asset('/list_of_publications') !!}">Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about-us') }}">About us</a>
        </li>
      </ul>
    </div>
  </nav>
 </div>			<!-- header end -->
</div>
<!-- HEADER SECTION -->
