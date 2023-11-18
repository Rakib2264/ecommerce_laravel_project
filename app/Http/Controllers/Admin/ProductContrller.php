<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductContrller extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.pages.product.allproduct',compact('products'));
    }
    public function AddProduct(){
        $categories = Category::orderBy('id','desc')->get();
        $subcategories = SubCategory::orderBy('id','desc')->get();
        return view('admin.pages.product.addproduct',compact('categories','subcategories'));
    }

    public function storeProduct(Request $request){
             $request->validate([
                'product_name' =>'required|unique:products',
                'product_short_des' =>'required',
                'product_long_des' =>'required',
                'price' =>'required',
                'quantity' =>'required',
                'product_category_id' =>'required',
                'product_subcategory_id' =>'required',
                'product_img' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'

             ]);

             $image = $request->file('product_img');
             $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             $request->product_img->move(public_path('upload'),$image_name);
             $img_url = 'upload/'.$image_name;

          // Direct database form category name
          $cat_id = $request->product_category_id;
          $categoryName = Category::where('id', $cat_id)->value('category_name');

          // Direct database form subcategory name
          $subcat_id = $request->product_subcategory_id;
          $subcategoryName = SubCategory::where('id', $subcat_id)->value('subcategory_name');

          $productstore = new Product();
          $productstore->product_name = $request->product_name;
          $productstore->product_short_des = $request->product_short_des;
          $productstore->product_long_des = $request->product_long_des;
          $productstore->price = $request->price;
          $productstore->product_category_name = $categoryName;
          $productstore->product_subcategory_name =  $subcategoryName;
          $productstore->product_category_id = $request->product_category_id;
          $productstore-> product_subcategory_id  = $request-> product_subcategory_id ;
          $productstore-> product_img  =  $img_url;
          $productstore-> quantity  = $request-> quantity ;
          $productstore-> slug  = Str::slug($request->product_name);;
          $productstore->save();

          Category::where('id', $cat_id)->increment('product_count',1);
          SubCategory::where('id', $subcat_id)->increment('product_count',1);

          return redirect()->route('allproduct')->with('success','Product Added Successfully');



    }

    public function editImageProduct($id){

        $productimginfo = Product::findOrFail($id);
        return view('admin.pages.product.editproductimg',compact('productimginfo'));
    }

    public function updateImageProduct(Request $request , $id){
        $request->validate([
            'product_img' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'

         ]);


        $productstore = Product::find($id);
        $old_img_path = public_path($productstore->product_img);

        if (file_exists($old_img_path)) {
            unlink($old_img_path); // Delete the old image.
        }

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $image_name);
        $img_url = 'upload/' . $image_name;

        $productstore->product_img = $img_url;
        $productstore->save();

        return redirect()->route('allproduct')->with('success', 'Successfully Image Update');
    }

    public function editProduct($id){

        $productinfo = Product::findOrFail($id);
        return view('admin.pages.product.editproduct',compact('productinfo'));
    }

    public function updateProduct(Request $request , $id){
        $request->validate([
            'product_name' =>'required|unique:products',
            'product_short_des' =>'required',
            'product_long_des' =>'required',
            'price' =>'required',
            'quantity' =>'required',

         ]);

        $productupdate = Product::findOrFail($id);
        $productupdate->product_name = $request->product_name;
        $productupdate->product_short_des = $request->product_short_des;
        $productupdate->product_long_des = $request->product_long_des;
        $productupdate->price = $request->price;
        $productupdate->quantity = $request->quantity;
        $productupdate->update();
        return redirect()->route('allproduct')->with('success', 'Product Updated');


    }
    public function deleteProduct($id){
        $deleteproduct = Product::find($id);
        $old_img_path = public_path($deleteproduct->product_img);

        if (file_exists($old_img_path)) {
            unlink($old_img_path); // Delete the old image.
        }


        $cat_id = Product::where('id',$id)->value('product_category_id');
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $deleteproduct->delete();
        Category::where('id',$cat_id)->decrement("product_count",1);
        SubCategory::where('id',$subcat_id)->decrement("product_count",1);
        return redirect()->route('allproduct')->with('info', 'Product Deleted');


    }
}
