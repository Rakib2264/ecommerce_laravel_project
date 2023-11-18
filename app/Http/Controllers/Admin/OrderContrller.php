<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderContrller extends Controller
{
    public function index(){
        $pending = Order::where('status','pending')->latest()->get();
        return view('admin.pages.order.pendingorder',compact('pending'));
    }
    public function confirmorder($id){

        $confirmorder = Order::find($id);
        $confirmorder->status = 'yes';
        $confirmorder->save();
         return redirect()->route('pendingorder')->with('success', 'This Order Has Been Confirmed');


    }

}
