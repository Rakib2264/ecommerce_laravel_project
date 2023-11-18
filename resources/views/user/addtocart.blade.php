@extends('user.layouts.template')
@section('main-content')
<div class="container">
      <div class="row">
           <div class="col-lg-12 col-md-12">
                   <div class="box_main">
                         <div class="table-responsive">
                                <table class="table">
                                      <tr>
                                           <th>Product Image</th>
                                           <th>Product Name</th>
                                          <th>Quantity</th>
                                          <th>Price</th>
                                          <th>Action</th>

                                      </tr>
                                      @php
                                          $total = 0 ;
                                      @endphp
                                      @foreach ($cart_item as $cart_item)
                                           <tr>
                                            <td><img src="{{asset($cart_item->product->product_img)}}" height="100" width="100" alt=""></td>
                                            <td>{{$cart_item->product->product_name}}</td>
                                              <td>{{$cart_item->quantity}}</td>
                                              <td>{{$cart_item->price}} &#2547;</td>
                                              <td>
                                                <a href="{{route('removecart',$cart_item->id)}}" class="btn btn-sm btn-info" >Remove</a>
                                               </td>
                                           </tr>
                                           @php
                                               $total = $total + $cart_item->price;
                                           @endphp


                                      @endforeach
                                      @if ($total > 0)
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total :</td>
                                        <td>{{$total}}</td>
                                        <td><a href="{{route('getshoppingaddress')}}" class="btn btn-sm btn-primary">Checkout</a></td>
                                        @endif
                                    </tr>
                                </table>
                         </div>
                   </div>
           </div>
      </div>
</div>
@endsection
