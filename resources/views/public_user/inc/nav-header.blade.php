
<header class="header sticky-top">


  <nav class="navbar navbar-expand-lg">

    <div class="col-md-10 mx-auto">
      <div class="navbar-brand float-left" name="button">
        <img class="mt-md-1" src="{{ asset('img/logo.png') }}" style="height: 50px; width: 50px" alt="">
      </div>
      <div class="navbar-buttons">

        {{-- Navivagion collapse --}}
        <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler">
          <span class="sr-only">Toggle navigation</span>
          <i class="fa fa-align-justify"></i>
        </button>
        {{-- End Navivagion collapse --}}

        @if ($activePage == "home" || $activePage == "writer" ||$activePage == "publication" || $activePage == "novel")

        <button type="button" class="btn btn-outline-secondary navbar-toggler">
          <span class="sr-only">Toggle search</span>
          <i class="fa fa-search"></i>
        </button>

        {{-- <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler">
          <span class="sr-only">Toggle search</span>
          <i class="fa fa-search"></i>
        </button> --}}
        @endif

        <a href="{{ route('product.shoppingCart') }}" class="btn btn-outline-secondary navbar-toggler">
          <i class="fa fa-shopping-cart"></i>
        </a>
      </div>

      <div id="navigation" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">


          <li class="nav-item">
            @if ($activePage == "home")
            <a href="{{ route('home') }}" class="nav-link active">Home</a>
            @else
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            @endif
          </li>
          <li class="nav-item dropdown menu-large">
            @if ($activePage == "writer")
              <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle active nav-link">
            @else
              <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">
            @endif

              Writer<b class="caret"></b></a>
            @php
              $authorCount = 0;
              $columnCount = 0;
              $authorDevider = 6;
            @endphp
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                    @foreach ($authors as $author)
                      @php
                        if (($authorCount%$authorDevider == 0) && ($columnCount != 0)) {
                          echo '</ul> </div>';
                        }
                        if ($authorCount%$authorDevider == 0) {
                          echo '<div class="col-md-6 col-lg-3">';

                          if ($columnCount==0) {
                            echo '<h5>Writer List</h5>';
                          } else {
                            echo '<p style="color: transparent">Clothing</p>';
                          }
                          echo '<ul class="list-unstyled mb-3">';
                          $columnCount++;
                        }
                        $authorCount++;
                        @endphp
                        <li class="nav-item"><a href="{{ route('writer', $author->id) }}" class="nav-link"> {{ $author->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Publication<b class="caret"></b></a>
            @php
              $publicationCount = 0;
              $publicationColumnCount = 0;
            @endphp
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                    @foreach ($publications as $publication)
                      @php
                        if (($publicationCount%4 == 0) && ($publicationColumnCount != 0)) {
                          echo '</ul> </div>';
                        }
                        if ($publicationCount%4 == 0) {
                          echo '<div class="col-md-6 col-lg-3">';

                          if ($publicationColumnCount==0) {
                            echo '<h5>Publication List</h5>';
                          } else {
                            echo '<p style="color: transparent">Clothing</p>';
                          }
                          echo '<ul class="list-unstyled mb-3">';
                          $publicationColumnCount++;
                        }
                        $publicationCount++;
                        @endphp
                        <li class="nav-item"><a href="{{ route('publication', $publication->id) }}" class="nav-link"> {{ $publication->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </li>
            </ul>
          </li>

          @if ($activePage == "novel")
            <li class="nav-item"><a href="{{ route('novel') }}" class="nav-link active">Novel</a></li>
          @else
            <li class="nav-item"><a href="{{ route('novel') }}" class="nav-link ">Novel</a></li>
          @endif
          @if ($activePage == "islamic")
            <li class="nav-item"><a href="{{ route('islamic') }}" class="nav-link active">Islamic Book</a></li>
          @else
            <li class="nav-item"><a href="{{ route('islamic') }}" class="nav-link ">Islamic Book</a></li>
          @endif
          @if ($activePage == "bestseller")
            <li class="nav-item"><a href="{{ route('bestseller') }}" class="nav-link active">Best Seller</a></li>
          @else
            <li class="nav-item"><a href="{{ route('bestseller') }}" class="nav-link ">Best Seller</a></li>
          @endif
          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
          @if ($activePage == "about_us")
          <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link active">About Us</a></li>
          @else
          <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link">About Us</a></li>
          @endif


        </ul>






        <div class="navbar-buttons d-flex justify-content-end">
          <!-- /.nav-collapse-->
          @if ($activePage == "home" || $activePage == "novel")

          <div id="search-not-mobile" class="navbar-collapse collapse">
            @if ($activePage == "home")
              <form method="get" action="/" role="search" class="ml-auto">
              @elseif ($activePage == "novel")
                <form method="get" action="novel" role="search" class="ml-auto">
            @endif

            <div class="input-group">
              <input type="text" name="search" placeholder="Search now" class="form-control">
              <div class="input-group-append">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
          </div>
        @endif


          <div id="basket-overview" class="navbar-collapse collapse d-none ml-2 d-lg-block">
      		    <a href="{{ route('product.shoppingCart')}}" title="Checkout Book" data-toggle="tooltip" class="btn btn-primary navbar-btn">
      					  <i class="fa fa-shopping-cart"></i>
      					  <span>
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
      		    </a>
      		</div>

        </div>
      </div>
    </div>
  </nav>

{{-- Search + Cart --}}
    <div id="search" class="collapse">
      <div class="container">
        <form role="search" class="ml-auto">
          @if ($activePage == "home" || $activePage == "writer" || $activePage == "publication" || $activePage == "novel")

          <div class="input-group">
            {{-- <input type="text" placeholder="Search after" class="form-control"> --}}
            <div class="input-group-append">
              <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        @endif
        </form>
      </div>
    </div>
</header>
