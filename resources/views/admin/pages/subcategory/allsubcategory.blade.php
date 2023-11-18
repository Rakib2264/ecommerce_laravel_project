@extends('admin.layouts.template')
@section('page_title')
All_Sub_Category - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Sub Category</h4>
        <div class="card">
            <h5 class="card-header">Avlilable Sub Category Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-warning">{{ session()->get('error') }}</div>
              @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th>Slug</th>
                            <th>Category Name</th>
                            <th>Product Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($subcategoryes as $subcategory)
                        <tr>

                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>{{$subcategory->slug}}</td>
                            <td>{{$subcategory->category_name}}</td>
                            <td>{{$subcategory->product_count}}</td>
                            <td>
                                <a href="{{route('editsubcat',$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('deletesubcat',$subcategory->id)}}" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this subcategory?')">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
