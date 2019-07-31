<!-- navbar-->
<header class="header">


  <nav class="navbar navbar-expand-lg">
      {{-- container --}}
      <div class="container">
          {{-- Brand Logo --}}
          <a href="index.html" class="navbar-brand home">
            <img style="height: 50px; width: 50px" src="{{ asset('img/logo.png') }}" alt="Soptoborno logo" class="d-none d-md-inline-block">
            <img style="height: 50px; width: 50px" src="{{ asset('img/logo.png') }}" alt="Soptoborno logo" class="d-inline-block d-md-none">
          </a>


          {{-- Collapse font awesome icons --}}
		      <div class="navbar-buttons">
            {{-- collapse navication --}}
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation icon</span><i class="fa fa-align-justify"></i></button>
            {{-- collapse search --}}
            @if ($activePage != "contact" && $activePage != "about_us")
              <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search icon</span><i class="fa fa-search"></i></button>
            @endif

            {{-- collapse Checkout --}}
            <a href="{{ route('cart.index')}}" class="btn btn-outline-secondary navbar-toggler">
              <i class="fa fa-shopping-cart"></i>
              <span>
                @php $cartTotal = 0; @endphp
                @foreach ($cartProducts as $cartProduct)
                  @php $cartTotal += $cartProduct->qty; @endphp
                @endforeach
                {{ $cartTotal }}
              </span>
            </a>
            {{-- END collapse Checkout --}}
          </div>

          {{-- Main navication menus --}}
          <div id="navigation" class="collapse navbar-collapse">







              {{-- main navication ul --}}
              <ul class="navbar-nav mr-auto">

                  {{-- home menu --}}
                  <li class="nav-item"><a href="{{ route('home') }}" class="nav-link @if($activePage == "home") active @endif">Home</a></li>

                  {{-- Writer dropdown menu --}}
                  <li class="nav-item dropdown menu-large">
                      <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle @if($activePage == "writer") active @endif nav-link">
                        Writer<b class="caret"></b></a>
                      @php
                        $authorCount   = 0;
                        $columnCount   = 0;
                        $authorDevider = 6;
                      @endphp

                      <ul class="dropdown-menu megamenu">
                        <li>
                          <div class="row">
                            @foreach ($authors as $author)
                              @if (($authorCount % $authorDevider == 0) && ($columnCount != 0))
                        </ul> </div>
                              @endif

                              @if ($authorCount % $authorDevider == 0)
                                <div class="col-md-6 col-lg-3">
                                @if ($columnCount == 0)
                                  <h5>Writer List</h5>
                                @else
                                  <p style="color: transparent">Clothing</p>
                                @endif
                                <ul class="list-unstyled mb-3">
                                @php $columnCount++; @endphp
                              @endif

                              @php $authorCount++; @endphp
                              <li class="nav-item"><a href="{{ route('writer', $author->id) }}" class="nav-link"> {{ $author->name }}</a></li>
                            @endforeach


                          </div>
                        </li>
                      </ul>
                  </li>


                  {{-- Publication dropdown menu --}}
                  <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link @if($activePage == "publication") active @endif">Publication<b class="caret"></b></a>
                    @php
                      $publicationCount       = 0;
                      $publicationColumnCount = 0;
                    @endphp
                    <ul class="dropdown-menu megamenu">
                      <li>
                        <div class="row">
                            @foreach ($publications as $publication)

                                @if (($publicationCount % 4 == 0) && ($publicationColumnCount != 0))
                                  </ul> </div>
                                @endif

                                @if ($publicationCount % 4 == 0)
                                  <div class="col-md-6 col-lg-3">

                                  @if ($publicationColumnCount == 0)
                                    <h5>Publication List</h5>
                                  @else
                                    <p style="color: transparent">Clothing</p>
                                  @endif
                                  <ul class="list-unstyled mb-3">
                                  @php $publicationColumnCount++; @endphp
                                @endif
                                @php $publicationCount++; @endphp
                                <li class="nav-item"><a href="{{ route('publication', $publication->id) }}" class="nav-link"> {{ $publication->name }}</a></li>
                              @endforeach


                        </div>
                      </li>
                    </ul>
                  </li>


                  {{-- novel menu --}}
                  <li class="nav-item"><a href="{{ route('novel') }}" class="nav-link @if($activePage == "novel") active @endif">Novel</a></li>

                  {{-- islamic book menu --}}
                  <li class="nav-item"><a href="{{ route('islamic') }}" class="nav-link @if($activePage == "islamic") active @endif">Islamic Book</a></li>

                  {{-- bestseller menu --}}
                  <li class="nav-item"><a href="{{ route('bestseller') }}" class="nav-link @if($activePage == "bestseller") active @endif">Best Seller</a></li>

                  {{-- contact menu --}}
                  <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link @if($activePage == "contact") active @endif">Contact</a></li>

                  {{-- about us menu --}}
                  <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link @if($activePage == "about_us") active @endif">About Us</a></li>

    			    </ul>






              {{-- big device search + checkout basket --}}
              <div class="navbar-buttons d-flex justify-content-end">

                  {{-- Search input field big device--}}
                  @if ($activePage != "contact" && $activePage != "about_us")


                    <div id="search-not-mobile" class="navbar-collapse collapse">
            				  <form role="search" class="ml-auto">
              					<div class="input-group">
              					  <input type="text" placeholder="Search big device" class="form-control">
              					  <div class="input-group-append">
              						    <button type="button" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                              </button>
              					  </div>
              					</div>
            				  </form>
            			  </div>
                  @endif

                  {{-- checkout for big device --}}
                  <div id="basket-overview" class="navbar-collapse collapse d-none ml-2 d-lg-block">
                    <a href="{{ route('cart.index')}}" class="btn btn-primary navbar-btn">
                      <i class="fa fa-shopping-cart"></i>
                      <span>
                        @php $cartTotal = 0; @endphp
                        @foreach ($cartProducts as $cartProduct)
                          @php $cartTotal += $cartProduct->qty; @endphp
                        @endforeach
                        {{ $cartTotal }}
                      </span>
                    </a>
                  </div>
              </div>



          </div>
          {{-- Main navication menus --}}

      </div>
      {{-- END container --}}
  </nav>






        {{-- Search input field for collapse or small device --}}
        <div id="search" class="collapse">
          <div class="container">
            <form role="search" class="ml-auto">
              <div class="input-group">
                <input type="text" placeholder="Search small device" class="form-control">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>



</header>
