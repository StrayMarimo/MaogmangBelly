@extends('layouts.app')
@section("content")
<div class="row d-flex justify-content-center m-2">
    <div class="custom-product col-6">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($products as $item)
                <div class="carousel-item {{$item['id'] == 1 ? 'active' : ''}}">
                    <a href="details/{{$item['id']}}">
                        <img class="slider-img w-100 px-5" src="{{$item['gallery']}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block slider-text">
                            <h5>{{$item['name']}}</h5>
                            <p>{{$item['description']}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev mx-5" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next mx-5" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="trending-warapper">
        <h3>Trending Products</h3>
        @foreach ($products as $item )
        <div class="trending-item col-5">
            <a href="details/{{$item['id']}}">
                <img src="{{$item['gallery']}}" class="trending-image mx-auto d-block">
                <div>
                    <h6 class="text-center">{{$item['name']}}</h6>
                </div>
            </a>
        </div>

        @endforeach
    </div>
    <div>
        <h1>Our Products</h1>
        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-fill" id="products" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="category-0" data-mdb-toggle="tab" href="#allproducts" role="tab"
                    aria-controls="allproducts" aria-selected="true">All Products</a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="category-{{$category['id']}}" data-mdb-toggle="tab"
                    href="#{{$category['name']}}" role="tab" aria-controls="{{$category['name']}}"
                    aria-selected="false">
                    <form action="/edit_category" method="POST" class="row g-3" id="form-{{$category['id']}}">
                        @csrf
                        <input type="hidden" name="category_id" value="0" id="cat-edit" class="category-tab">
                        <div class="col-auto">
                            <input type="text" class="form-control-plaintext category-tabs text-center text-capitalize"
                                id="tab-{{$category['id']}}" value="{{$category['name']}}" name="category_name"
                                readonly />
                        </div>
                        @if($isAdmin)
                        <div class="col-auto">
                            <button type="button" class="btn" id="cat-icon-{{$category['id']}}"
                                onclick="editCategory({{$category['id']}})">
                                <i class="bi bi-pencil-fill" id="cat-icon-{{$category['id']}}"></i>
                            </button>
                        </div>
                        @endif


                    </form>

                </a>
            </li>
            @endforeach
            @if($isAdmin)
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize" id="category-{{$category['id']}}" data-mdb-toggle="tab"
                    href="#{{$category['name']}}" role="tab" aria-controls="{{$category['name']}}"
                    aria-selected="false"><i class="bi bi-plus-circle"></i></a>
            </li>
            @endif
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="products-content">
            <div class="tab-pane fade show active" id="allproducts" role="tabpanel" aria-labelledby="category-0">
                @foreach($products as $product)
                <div>
                    {{$product['name']}}
                </div>
                @endforeach
            </div>
            @foreach($categories as $category)
            <div class="tab-pane fade" id="{{$category['name']}}" role="tabpanel"
                aria-labelledby="category-{{$category['id']}}">
                @foreach($products as $product)
                @if($product['category_id'] == $category['id'])
                <div>
                    {{$product['name']}}
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <!-- Tabs content -->

    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
  
    });
    function editCategory(id) {
        $("#cat-edit").val(id);
        let catInput = $("#tab-"+id);
        if ($("i#cat-icon-"+id).hasClass("bi-pencil-fill")) {
            $("i#cat-icon-"+id).removeClass("bi-pencil-fill").addClass("bi-check2-square");
            catInput.removeAttr("readonly");
            catInput.css("border","solid 1px black");      
        } else {
            $("i#cat-icon-"+id).removeClass("bi-check2-square").addClass("bi-pencil-fill");
            catInput.attr("readonly", true);
            catInput.css("border","none");
            $("#form-"+id).submit();
        }
  

    }
</script>
@endpush