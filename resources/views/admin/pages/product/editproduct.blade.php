@extends('admin.layouts.template')
@section('page_title')
    Add_Product - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updatrproduct',$productinfo->id)}}" method="POST" >
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="product_name" name="product_name" class="form-control"
                                        id="basic-default-name" value="{{$productinfo->product_name}}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" id="price" name="price" class="form-control"
                                        id="basic-default-name"  value="{{$productinfo->price}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" id="quantity" name="quantity" class="form-control"
                                        id="basic-default-name"  value="{{$productinfo->quantity}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_short_des" class="form-control" id="product_short_des" rows="2">{{$productinfo->product_short_des}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_long_des" class="form-control" id="product_long_des" rows="3">{{$productinfo->product_long_des}}</textarea>
                                </div>
                            </div>


                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
