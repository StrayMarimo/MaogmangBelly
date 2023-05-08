@extends('layouts.app')
@section("content")
<div style="max-width: 100vw;">
  <a href="/" style="font-family: lexend; margin-left: 30px; margin-bottom: 50px">Go Back</a>
  <h4 class="mb-3 mt-2 tag2" style="font-family: lexend">Result for Products</h4>
  <div class="col-sm-12 mx-2">

      @foreach($products->chunk(3) as $chunk)
      <div class="row" style="max-width: 100vw;">
        @foreach($chunk as $item)
        <div class="col-sm-4">
          <div class="card mx-4">
            <a href="{{ route('product_details', ['id' => $item['id']]) }}" id="searchCard">
              <img class="card-img-top" src="{{ asset('assets/product_assets/'.$item['gallery']) }}"
                alt="{{ $item['name'] }}" style="object-fit: cover; width: 100%; height: 30vh;">
              <div class="card-body">
                <h5 class="card-title">{{$item['name']}}</h5>
                <p class="card-text" style="max-height: 6em; overflow: hidden; text-overflow: ellipsis;">
                  {{$item['description']}}</p>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
  
  </div>
</div>

@endsection