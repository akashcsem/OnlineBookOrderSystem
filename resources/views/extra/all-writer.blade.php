@extends('public_user.master-mega')

@section('page-title')
  Writer List
@endsection

@section('additional_script')
  <link rel="stylesheet" href="{{ asset('public_user/css/homepage.css') }}">
  <style media="screen">
   .writer-items {
     background: #2A3038;
   }
    span a {
      color: white;
    }
    .writer-block {
      background: #363D47;
    }
    .active {
      background: #3EAA94;
    }

    .more {
      background: #363D47;
      border: 1px solid green;
    }
    .more:hover {
      background: green !important;
      color: red !important;
    }

  </style>
@endsection

@section('header')
  @include('public_user.inc.mega-header-with-search')
@endsection

@section('main-content')
{{-- Writer or Author list --}}
        <div class="author-list py-2 writer-items">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="container">
                <div class="row">
                @php
                  $itemCount = 1;
                @endphp
                @foreach ($authors as $author)
                  @if ($curentAuthor->id == $author->id)
                    <span class="px-2 mr-3 my-1 writer-block active">
                      <a class="writer-item" href="{{$author->id}}">{{$author->name}}</a>
                    </span>
                    @else
                      <span class="px-2 mr-3 my-1 writer-block">
                        <a class="writer-item" href="{{ route('writer', $author->id) }}">{{$author->name}}</a>
                      </span>
                  @endif
                  @php
                  if ($itemCount>11) {
                    echo
                    '<span class="px-2 mr-3 my-1 more">
                      <a class="writer-item" href="">More Writer</a>
                    </span>';
                    break;
                  }
                    $itemCount++;
                  @endphp
                @endforeach
              </div>
            </div>
            </div>
          </div>
        </div>


        <div class="row my-4 justify-content-center">
          <div class="col-md-10">
            <div  class="w-100 py-3 px-4 ">
              <h4 class="text-light"> {{ $curentAuthor->name }} </h4>
            </div>
            <div class="details row mx-0">
              <div class="col-lg-3 col-md-5 col-sm-7 mb-2 px-0">
                <img style="width: 100%; height: 250px;" class="img-left my-2" src="{{ asset('img/writer/'.$curentAuthor->image) }}" alt="{{ $curentAuthor->image }}"/>
              </div>
              <div class="content-heading col-lg-9 col-md-7 col-sm-10">
                <p class="px-2 pb-2 h-4">
                   <h5 style="line-height: 30px">
                   {{ $curentAuthor->description }}&nbsp;&nbsp;&nbsp;
                     <a class="text-success no-underline" href="{{ $curentAuthor->more_about }}" target="_blank">More Detail...</a> </h5>
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- New publication -->
        <div  class="row m-0 p-0">



          <div id="new_published" class="carousel slide col-md-10 mx-auto px-0">

            <div class="text-center py-3" style="background: #B3DCED">
              <h3>{{ $curentAuthor->name }}'s More Books</h3>
            </div>
            <!-- carousel inner -->
            <div class="row clearfix px-3">


                {{-- <div class="carousel-item active">  <!-- carousel item 1 -->
                  <div class="row justify-content" > --}}

                    @foreach ($products as $book)
                      @if ($curentAuthor->id == $book->author_id)

                      <div class="col-md-2 text-center my-4">
                        <div class="con">
                          <div class="custom-container">

                            <img src="{{ asset('product/'.$book->image) }}" alt="Avatar" class="image">
                            <div class="middle m-0 p-0">
                              <div class="text m-0 p-0">
                                <a class="btn btn-primary" href="{{ route('single.help', $book->id) }}">View Details</a>
                                <br><br>
                                {!! Form::open(['url' => '/add-to-cart','method' => 'POST']) !!}
                                  <input type="hidden" name="id" value="{{ $book->id }}">
                                  <input type="hidden" name="qty" value="1">
                                  <button type="submit" class="btn btn-success" name="button">Add to Cart</button>
                                {!! Form::close() !!}
                              </div>
                            </div>

                            <label style="margin-top: 5px; margin-bottom: 0; font-size: 16px;">
                                {{ $book->name }}
                            </label><br>

                            <label style="margin-top: 0; margin-bottom: 0; font-size: 12px;">
                                {{ $book->price }} Tk.
                            </label>
                          </div>
                        </div>
                      </div>

                    @endif
                    @endforeach
{{--
                </div>
              </div> --}}
            </div> 	<!-- end carousel inner -->
          </div>

        {{-- <div class="w-100 row justify-content-center text-success h-2 py-2 my-4">
            <div class="col-md-10 text-right">
              <h4><a class="ml-auto btn btn-success" href="#">More Like...</a> </h4>
            </div>
        </div> --}}
      </div>    <!-- New Publications end -->


</div>   <!-- bg end -->
@endsection

@section('additional_script')
  <script src="{{asset('public_user/js/scroll_tooltip.js')}}"></script>
@endsection
