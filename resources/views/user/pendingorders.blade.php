@extends('user.layouts.user_profile')
@section('userprofile')

<table class="table">
    <h2 class="text-center">Pending Orders</h2>
    <tr>
        <td>Product Id</td>
        <td>Price</td>
    </tr>
    @foreach ($pending as $pending)
    <tr>
        <td>{{$pending->product_id}}</td>
        <td>{{$pending->total_price}}</td>
       </tr>
    @endforeach

</table>


 

@endsection
