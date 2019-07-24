<div class="mr-2 ml-5 mb-3" style="border : 1px solid gray; height: 100%; margin-right: -5px;">


  {{-- <div class="custom-control custom-checkbox mb-2"> --}}
    {{-- <input type="checkbox"checked class="custom-control-input" id="111">
    <a href="{{ route('productByCategory', 1) }}">
    <label class="custom-control-label font-weight-normal pt-1" style="font-size: 14px; cursor: pointer;" for="111"> All Category</label>
    </a> --}}

  {{-- </div> --}}

  <div class="category-sidebar">
    @if ($selectedCategory == 0)
    <h6 class="pl-2 text-light py-2" style="background: #3EAA94">
    @else
    <h6 class="pl-2 text-light py-2" style="background: #3B5998">
    @endif
      <i class="fa fa-arrow-right"></i>
      <a href="{{ route('productByCategory', 0) }}">
        All Category
      </a>
    </h6>
    <!-- Default unchecked -->
    @foreach ($categories as $category)
      @if ($selectedCategory == $category->id)
      <h6 class="pl-3 text-light py-1" style="background: #3EAA94">
      @else
      <h6 class="pb-1 pl-3">
      @endif
      <i class="fa fa-arrow-right"></i>
        <a href="{{ route('productByCategory', $category->id) }}">
          {{ $category->name }}
        </a>
      </h6>
        {{-- <div class="custom-control custom-checkbox mb-2">
          <input type="checkbox" class="custom-control-input" id="{{ $category->id }}">
          <label class="custom-control-label font-weight-normal pt-1" style="font-size: 14px; cursor: pointer;" for="{{ $category->id }}"> {{ $category->name }} </label>
        </div> --}}

    @endforeach

  </div>
</div>
