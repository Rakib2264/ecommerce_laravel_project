@extends('admin.layouts.template')
@section('content')
@section('page_title')
Pending Orders - Single E-com
@endsection
<div class="container mt-3">
    <div class="card">
        <div class="card-title">
            <h3 class="text-center mt-4">Pending Orders</h3>
        </div>
        <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>User Id</th>
                            <th>Shipping Info</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Total Will Pay</th>
                            <th>Action</th>
                         </tr>
                         @foreach ($pending as $pending)
                            <tr>
                                <td>{{ $pending->userid}}</td>
                                 <td>
                                    <ul>
                                        <li>Phone Number - {{ $pending->shipping_phone}}</li>
                                        <li>City - {{ $pending->shipping_city}}</li>
                                        <li>Postal Code - {{ $pending->postalcode}}</li>
                                    </ul>
                                 </td>
                                 <td>{{ $pending->product_id}}</td>
                                 <td>{{ $pending->quantity}}</td>
                                 <td>{{ $pending->total_price}}</td>
                                 <td> <a href="{{route('confirmorder',$pending->id)}}" class="btn btn-sm btn-info">Approve Now</a> </td>
                            </tr>
                         @endforeach
                 </table>
        </div>
    </div>
</div>
@endsection
