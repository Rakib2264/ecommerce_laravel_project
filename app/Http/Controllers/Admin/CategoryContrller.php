<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryContrller extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.pages.category.allcategory',compact('categories'));
    }
    public function AddCategory(){
        return view('admin.pages.category.addcategory');
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();
        return redirect()->route('allcategory')->with('message','Category Added Successfully');

    }

    public function editCategory($id){
         $category_info = Category::findOrFail($id);
        return view('admin.pages.category.editcategory', compact('category_info'));
    }

    public function updateCategory(Request $request , $id){

        $request->validate([
            'category_name'=>'required|unique:categories'
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();
        return redirect()->route('allcategory')->with('message','Category Update Successfully');
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('allcategory')->with('error','Category Delete Successfully');
    }

}

