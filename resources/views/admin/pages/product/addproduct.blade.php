@extends('admin.layouts.template')
@section('page_title')
    Add_Product - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="product_name" name="product_name" class="form-control"
                                        id="basic-default-name" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" id="product_category_id" name="product_category_id"
                                        class="form-select">
                                        <option selected disabled>-----Select Category-----</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" id="product_subcategory_id" name="product_subcategory_id"
                                        class="form-select">
                                        <option selected disabled>-----Select Sub Category-----</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" id="price" name="price" class="form-control"
                                        id="basic-default-name" placeholder="00.00">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" id="quantity" name="quantity" class="form-control"
                                        id="basic-default-name" placeholder="00.00">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_short_des" class="form-control" id="product_short_des" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea name="product_long_des" class="form-control" id="product_long_des" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" onchange="preImage(this)" name="product_img" type="file" id="formFile">
                                    <img id="imagePre" src="{{asset('userblankimg/user.png')}}" alt="Image Preview" width="100" height="100">                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
