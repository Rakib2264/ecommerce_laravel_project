@extends('admin.layouts.template')
@section('page_title')
All_Product - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Products</h4>
        <div class="card">
            <h5 class="card-header">Avlilable All Product Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                        <tr>

                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                               <img src="{{asset($product->product_img)}}" height="80" alt="">
                               <br>
                               <a href="{{route('editproductimage',$product->id)}}" class="btn btn-sm btn-secondary">Update</a>


                            <td>
                                <a href="{{route('editproduct',$product->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('deleteproduct',$product->id)}}" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

