@extends('user.layouts.template')
@section('main-content')
    <h3>Order Confirmed</h3>
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="box_main">
                Product Will Send At
                <p>City/Village- {{ $shippingaddress->address }}</p>
                <p>Postal Code- {{ $shippingaddress->code }}</p>
                <p>Phone Number- {{ $shippingaddress->phone }}</p>

            </div>

        </div>


        <div class="col-lg-4 col-md-4">
            <div class="box_main">
                <h3>Your Final Product Are</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>

                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_item as $cart_item)
                            <tr>
                                <td><img src="{{ asset($cart_item->product->product_img) }}" height="100" width="100"
                                        alt=""></td>
                                <td>{{ $cart_item->product->product_name }}</td>
                                <td>{{ $cart_item->quantity }}</td>
                                <td>{{ $cart_item->price }} &#2547;</td>

                            </tr>
                            @php
                                $total = $total + $cart_item->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td>Total :</td>
                            <td></td>
                            <td></td>
                            <td>{{ $total }} &#2547;</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <form style="margin-bottom: 20px" action="" method="post">
            <button type="submit" class="btn btn-sm btn-dark mr-2">Cancel Order</button>
        </form>
        <form style="margin-bottom: 20px" action="{{route('placeorder')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-sm btn-info mr-2">Place Order</button>
        </form>

    </div>
@endsection
