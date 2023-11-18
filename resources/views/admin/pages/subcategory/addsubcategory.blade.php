@extends('admin.layouts.template')
@section('page_title')
Add_Sub_Category - Single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Sub Category</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Sub Category</h5>
                 </div>
                <div class="card-body">
                    <form action="{{route('storesubcategoriesss')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="subcategory_name" name="subcategory_name" class="form-control" id="basic-default-name" placeholder="Sub Category Name">
                                @error('subcategory_name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select id="defaultSelect" id="category" name="category_id" class="form-select">
                                    <option selected disabled>-----Select Category-----</option>
                                    @foreach ($categoryes as $category)

                                    <option name="category->id" value="{{$category->id}}">{{$category->category_name}}</option>
                                     @endforeach
                                  </select>
                                  @error('category_id')
                                  <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                                </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

