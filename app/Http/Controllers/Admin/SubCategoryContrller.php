<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryContrller extends Controller
{
    public function index(){
        $subcategoryes = SubCategory::latest()->get();
        return view('admin.pages.subcategory.allsubcategory',compact('subcategoryes'));
    }
    public function AddSubCategory(){
        $categoryes = Category::latest()->get();
        return view('admin.pages.subcategory.addsubcategory',compact('categoryes'));
    }
    public function storeSubCategoryy(Request $request){
         $request->validate([
            'subcategory_name'=>'required|unique:sub_categories',
            'category_id'=>'required'
        ]);
         $category_id = $request->category_id;
         $category_name = Category::where('id',$category_id)->value('category_name');

         SubCategory::insert([
           'subcategory_name'=> $request->subcategory_name,
           'slug' => Str::slug($request->subcategory_name),
           'category_id' => $category_id,
           'category_name' =>  $category_name,
         ]);

         Category::where('id', $category_id)->increment('subcategory_count',1);
         return redirect()->route('allsubcategory')->with('message','SubCategory Added Successfully');

    }
    public function editSubCategory($id){
         $subcatinfo = SubCategory::findOrFail($id);
        return view('admin.pages.subcategory.editsubcat',compact('subcatinfo'));
    }

    public function updateSubCategory(Request $request, $id) {
        $this->validate($request, [
            'subcategory_name' => 'required',

        ]);

         $subcategory = SubCategory::findOrFail($id);

         $subcategory->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
         ]);
        return redirect()->route('allsubcategory')->with('message','Sub Category Updated Successfully');

    }



        public function deleteSubCategory($id){
            $cat_id = SubCategory::where('id',$id)->value('category_id');
            $subcategory = SubCategory::findOrFail($id);
            Category::where('id',$cat_id)->decrement("subcategory_count",1);

            $subcategory->delete();
            return redirect()->route('allsubcategory')->with('error','Sub Category Delete Successfully');
        }
    }

