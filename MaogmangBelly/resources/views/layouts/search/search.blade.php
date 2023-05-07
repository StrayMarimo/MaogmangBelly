@extends('layouts.app')
@section("content")
<div class="custom-product">
  <a href="/" style="font-family: lexend; margin-left: 30px; margin-bottom: 50px">Go Back</a>
  <h4 class="mb-3 mt-2 tag2" style="font-family: lexend">Result for Products</h4>
  <div class="col-sm-12 mx-2">
    <div class="trending-wrapper">
      @foreach($products->chunk(3) as $chunk)
        <div class="row">
          @foreach($chunk as $item)
            <div class="col-sm-4">
              <div class="card mx-4">
                <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                  <img class="card-img-top" src="{{ asset('assets/product_assets/'.$item['gallery']) }}" alt="{{ $item['name'] }}" style="object-fit: cover; width: 100%; height: 30vh;">
                </a>
                <div class="card-body">
                  <h5 class="card-title">{{$item['name']}}</h5>
                  <p class="card-text" style="max-height: 6em; overflow: hidden; text-overflow: ellipsis;">{{$item['description']}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection


<!-- <div class="custom-product">
     <div class="col-sm-4 mx-2">
         <a href="/">Go Back</a>
     </div>
     <div class="col-sm-4 mx-2">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @foreach($products as $item)
            <div class="card">
              <a href="{{ route('product_details', ['id' => $item['id']]) }}">
                <img class="card-img-top" src="{{ asset('assets/product_assets/'.$item['gallery']) }}" alt="{{ $item['name'] }}">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{$item['name']}}</h5>
                <p class="card-text">{{$item['description']}}</p>
              </div>
            </div>
            @endforeach
          </div>
     </div>
</div> -->

<!-- <div class="custom-product">
     <div class="col-sm-4 mx-2">
         <a href="/">Go Back</a>
     </div>
     <div class="col-sm-4 mx-2">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @foreach($products as $item)
            <div class="searched-item">
              <a href="{{ route('product_details', ['id' => $item['id']]) }}">
              <img class="trending-image" src="{{ asset('assets/product_assets/'.$item['gallery']) }}">
              <div class="">
                <h2>{{$item['name']}}</h2>
                <h5>{{$item['description']}}</h5>
              </div>
            </a>
            </div>
            @endforeach
          </div>
     </div>
</div> -->