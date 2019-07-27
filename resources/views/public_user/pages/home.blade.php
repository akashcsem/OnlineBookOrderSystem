
@extends('master.public')

@section('page-title')
  Online Book Order System
@endsection

@section('additional_script')

@endsection





@section('main-content')
  <div class="row">
    <div class="col-md-8 mx-auto">
      @if (session()->has('success'))
        <div class="alert alert-success">
          <strong>Success!</strong>
          {{ Session::get('success') }}
        </div>
      @endif
    </div>
  </div>
  {{-- <div id="hot"> --}}
    @include('public_user.inc.banner_slider')
    {{-- Book group --}}
    @include('public_user.inc.book_group')

    <div class="row">

      <div class="col-md-12 mx-auto">
        <div class="row">



          <!-- Category Lists Sidebar -->
          <div class="col-md-3 " style="height: 100%;">
              @include('public_user.inc.sidebar-category')
          </div>
          <!-- End Category Lists Sidebar -->



          {{-- ==============   Product Section =================  --}}
          <div class="col-md-9 pr-5">
              <div class="mr-5">
                @include('public_user.inc.product-card')
              </div>
              <div class="float-center mb-5">
                {{ $products->links() }}
              </div>
          </div>
          {{-- End Product Section --}}


       </div>
      </div>
    </div><!-- End Product + Category sidebar-->
  {{-- </div> <!-- /.container--> --}}

@endsection

@section('additional_script')
  <script src="{{ asset('public_user/js/scroll_tooltip.js') }}"></script>
@endsection
