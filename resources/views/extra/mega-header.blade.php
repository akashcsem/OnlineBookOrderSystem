
<header class="header">
  <!--
  *** TOPBAR ***
  _________________________________________________________
  -->

  <nav class="navbar navbar-expand-lg">
    <div class="container"><a href="{{ route('home') }}" class="navbar-brand home"><img style="height: 50px; width: 50px" src="{{ asset('mega/img/logo.png') }}" alt="Obaju logo" class="d-none d-md-inline-block"><img src="{{asset('mega/img/logo-small.png')}}" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
      <div class="navbar-buttons">
        <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
        <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
      </div>
      <div id="navigation" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Writer<b class="caret"></b></a>
            @php
              $authorCount = 0;
              $columnCount = 0;
            @endphp
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                    @foreach ($authors as $author)
                      @php
                        if (($authorCount%4 == 0) && ($columnCount != 0)) {
                          echo '</ul> </div>';
                        }
                        if ($authorCount%4 == 0) {
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
          {{-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Ladies<b class="caret"></b></a>
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                  <div class="col-md-6 col-lg-3">
                    <h5>Clothing</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                    </ul>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <h5>Shoes</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                    </ul>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <h5>Accessories</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                    </ul>
                    <h5>Looks and trends</h5>
                    <ul class="list-unstyled mb-3">
                      <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                      <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                    </ul>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="banner"><a href="#"><img src="{{asset('mega/img/banner.jpg')}}" alt="" class="img img-fluid"></a></div>
                    <div class="banner"><a href="#"><img src="{{asset('mega/img/banner2.jpg')}}" alt="" class="img img-fluid"></a></div>
                  </div>
                </div>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item"><a href="{{ route('publication') }}" class="nav-link ">Publications</a></li> --}}
          <li class="nav-item"><a href="{{ route('novel') }}" class="nav-link ">Novel</a></li>
          @if ($activePage == "contact")
          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link active">Contact</a></li>
          @else
          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
          @endif
          @if ($activePage == "about_us")
          <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link active">About Us</a></li>
          @else
          <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link">About Us</a></li>
          @endif

        </ul>

      </div>
    </div>
  </nav>

</header>
