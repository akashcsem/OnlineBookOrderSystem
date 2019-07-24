@extends('public_user.master')

@section('page-title')
  Online Book Order System
@endsection

@section('header')
  @include('public_user.inc.header-with-search')
@endsection

@section('main-content')
  <div class="row bg-dark">
    @include('public_user.inc.book_group')
  </div>




  <!-- New publication -->
  <div  class="row m-0 p-0">
    <div  class="w-100 text-center py-1 mt-4 mb-2">
         <span class="h4">[</span> নতুন প্রকাশিত বইসমূহ <span class="h4">] </span>
    </div>

    <div id="category_select" class="col-md-2 ml-auto px-0">
      <div class="border p-1 mr-2 mb mt-4">
        <div class="custom-control mb-3 custom-checkbox">
            <input type="checkbox" checked class="custom-control-input" id="all">
            <label class="custom-control-label" style="font-size: 18px" for="all"> All Author</label>
        </div>
        <div class="ml-2">
          @foreach ($authors as $author)
            <!-- Default unchecked -->
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="{{ $author->id }}">
                <label class="custom-control-label font-weight-normal" style="font-size: 18px; cursor: pointer;" for="{{ $author->id}}"> {{ $author->name }}</label>
            </div>
          @endforeach
        </div>
      </div>

    </div>

    <div id="new_published" class="carousel  col-md-8 mr-auto px-0">


      <!-- carousel inner -->
      <div class="clearfix px-3">


          <div class="">  <!-- carousel item 1 -->
            <div class="row" >
              @php
                $count = 0;
              @endphp
              @foreach ($products as $book)
                @php
                  if ($count%5 == 0) {
                  echo '<div class="col-md-2 text-center ml-2 my-4">';
                  } else {
                    echo '<div class="col-md-2 text-center mx-auto my-4">';
                  }
                  $count++;
                @endphp

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
              @endforeach

          </div>
        </div>
        <div class="w-100 text-center text-light py-2 my-4" style="background: #6A9FB5;">
            <span style="cursor: pointer">See more.....</span>
        </div>
      </div> 	<!-- end carousel inner -->
    </div>


</div>    <!-- New Publications end -->




</div>   <!-- bg end -->
@endsection

@section('additional_script')
  <script src="{{asset('public_user/js/scroll_tooltip.js')}}"></script>
@endsection
