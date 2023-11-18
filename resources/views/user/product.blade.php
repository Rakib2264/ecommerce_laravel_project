@extends('user.layouts.template')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="tshirt_img">
                    <img src="{{ asset($product->product_img) }}" alt="T-Shirt Image">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box_main">
                <div class="product-info">
                    <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                    <p class="price_text text-left">Price <span style="color: #7e6262;">{{$product->price}} &#2547;</span></p>
                </div>
                <div class="my-3 product-details">
                    <p class="lead">{{$product->product_short_des}}</p>
                  <ul>
                    <li>Category: {{$product->product_category_name}}</li>
                    <li>SubCategory: {{$product->product_subcategory_id}}</li>
                    <li>Available Quantity: {{$product->quantity}}</li>
                  </ul>

                 <div class="mt-4">
                    <ul>
                        <li>
                            <form action="{{route('addproducttocart')}}" method="post">
                                @csrf
                                          <input type="hidden" value="{{ $product->id }}" name="product_id">
                                         <input type="hidden" value="{{ $product->price }}" name="price">
                                <div class="form-group">
                                <label for="qty">How Many Pics?</label>
                                <input class="form-control" type="number" value="1" id="qty" min="1" placeholder="1"  name="quantity">
                               </div>
                                <input class="btn btn-sm btn-warning" type="submit" value="Add To Cart">
                            </form>

                        </li>

                    </ul>
                 </div>

                </div>
            </div>
        </div>
    </div>

    <div class="fashion_section mt-5">
        <div class="container">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @foreach ($releted_product as $releted_product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $releted_product->product_name }}</h4>
                            <p class="price_text">Price <span style="color: #262626;">{{ $releted_product->price }}
                                    &#2547;</span></p>
                            <div class="tshirt_img"><img src="{{ asset($releted_product->product_img) }}">
                            </div>
                            <div class="btn_main">
                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                <div class="seemore_bt"><a href="{{route('singleproduct',[$releted_product->id , $releted_product->slug] )}}">See More</a></div>
                            </div>
                        </div>

                    </div>
                @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
