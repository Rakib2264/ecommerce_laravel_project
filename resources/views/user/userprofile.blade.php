@extends('user.layouts.user_profile')
@section('userprofile')

<table class="table">
    <h2 class="text-center">Confirm Orders</h2>
    <tr>
        <td>Product Id</td>
        <td>Price</td>
    </tr>
    @foreach ($confirm as $confirm)
    <tr>
        <td>{{$confirm->product_id}}</td>
        <td>{{$confirm->total_price}}</td>
       </tr>
    @endforeach

</table>


 

@endsection
