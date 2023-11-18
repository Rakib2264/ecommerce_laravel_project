<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\ShippingInfo;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function Category($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user.category', compact('category', 'products'));
    }

    public function singleProduct($id)
    {
        $product = Product::find($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $releted_product = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user.product', compact('product', 'releted_product'));
    }

    public function AddToCart()
    {
        $userid = Auth::id();
        $cart_item = Cart::where('user_id', $userid)->latest()->get();
        return view('user.addtocart', compact('cart_item'));
    }

    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);
        return redirect()->route('addtocart')->with('success', 'Your Item Added To  Cart Successfully');
    }

    public function RemoveCart($id)
    {
        $removecart = Cart::findOrFail($id);
        $removecart->delete();
        return redirect()->route('addtocart')->with('success', 'Your Item Has Been Removed');
    }



    public function GetShoppingAddress()
    {
        return view('user.shoppingaddress');
    }


    public function AddShoppingAddress(Request $request)
    {
        $shippinginfo = new ShippingInfo();
        $shippinginfo->user_id = Auth::id();
        $shippinginfo->phone = $request->phone;
        $shippinginfo->address = $request->address;
        $shippinginfo->code = $request->code;
        $shippinginfo->save();
        return redirect()->route('checkout')->with('success', 'Your Order Confirmed');

    }


    public function Checkout()
    {
        $userid = Auth::id();
        $cart_item = Cart::where('user_id', $userid)->latest()->get();
        $shippingaddress = ShippingInfo::where('user_id', $userid)->first();
        return view('user.checkout',compact('cart_item','shippingaddress'));
    }

    public function PlaceOrder(){
        $userid = Auth::id();
        $shippingaddress = ShippingInfo::where('user_id', $userid)->first();
        $cart_item = Cart::where('user_id', $userid)->latest()->get();
        foreach($cart_item as $item){
            Order::insert([
                 'userid' =>$userid,
                 'shipping_phone' => $shippingaddress->phone,
                 'shipping_city' => $shippingaddress->address,
                 'postalcode' => $shippingaddress->code,
                 'product_id' => $item->product_id,
                 'quantity' => $item->quantity,
                 'total_price' => $item->price,
            ]);
            $id = $item->id;
            Cart::find($id)->delete();
        }

        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('success', 'Your Order Has Been Placed Successfully');

    }

    public function userprofile()
    {
        $confirm = Order::where('status','yes')->latest()->get();
        return view('user.userprofile',compact('confirm'));
    }

    public function pendingOrders()
    {
           $id = Auth::id();
        $cart = Order::where('userid',$id)->latest()->first();
        $pending = Order::where('status','pending')->latest()->get();
        return view('user.pendingorders',compact('pending','cart'));
    }

    public function History()
    {
        return view('user.history');
    }

    public function NewRealease()
    {
        return view('user.newrealease');
    }

    public function TodysDeal()
    {
        return view('user.todysdeal');
    }

    public function CustomerService()
    {
        return view('user.customerservice');
    }


     
}
