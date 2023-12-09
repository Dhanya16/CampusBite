<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\counters;
use Illuminate\View\View;
use App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\menu;
use App\Models\inventory;
use App\Models\order_item;
use App\Models\orders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class counterController extends Controller
{
    //
    public function index()
    {
        $item = menu::all();
        $cumulativeTotal = $this->calculateCumulativeTotal(session('cart', []));
        return view('counterpage',compact('item','cumulativeTotal'));
    }
    public function search1(Request $request)
    {
        $Itemid = $request->input('searchbar');
        $item = menu::where('Itemid', $Itemid)->get();
        $items = inventory::where('Itemid', $Itemid)->get();
        return view('counterpage', ['item' => $item,'items' => $items]);
    }
    public function addToCart(Request $request, $Itemid)
    {
        $item = menu::where('Itemid', $Itemid)->first();

        if ($item) {
            // Check if the cart session variable exists
            if (!session()->has('cart')) {
                // If not, initialize an empty array
                session(['cart' => []]);
            }
            // get qty from request
            $quantity= $request->input('quantity');
            // Add the item and qty  to the cart array in the session
            session()->push('cart', ['item' => $item,'quantity' => $quantity]);
              // Calculate the cumulative total
            $cumulativeTotal = $this->calculateCumulativeTotal(session('cart', []));
            return redirect()->back()->with('status', 'Item added successfully!!')->with('cumulativeTotal', $cumulativeTotal);
        }   
    }
    private function calculateCumulativeTotal($cartItems)
    {
        $cumulativeTotal = 0;
        foreach ($cartItems as $cartItem) {
            if (isset($cartItem['item']) && $cartItem['item'] !== null) {
                $itemTotal = $cartItem['item']->Price * $cartItem['quantity'] * 1.03; // Adjust this calculation accordingly
                $cumulativeTotal += $itemTotal;
            }
        }
        return $cumulativeTotal;
    }
    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->back()->with('status', 'Cart cleared successfully!!');
    }
    public function saveOrder()
    {
        
        $username= session('counter_username');
        $counterid=counters::where('username', $username)->first();
        $cumulativeTotal = $this->calculateCumulativeTotal(session('cart', []));
        //  new order in the 'orders' table
        $order = new orders();
        $order->Userid = $counterid->counterid;
        $order->Orderdate = now();
        $order->TotalAmt = $cumulativeTotal;
        $order->save();

        Session::save();

    
        // Get the order ID from 'orders' table
        $orderId = $order-> Orderid;
    
        // Save each item in the 'order_item' table
        foreach (session('cart', []) as $cartItem) {
            if (isset($cartItem['item']) && $cartItem['item'] !== null) {
                $orderItem = new order_item();
                $orderItem->Orderid = $orderId;
                $orderItem->Itemid = $cartItem['item']->Itemid;
                $orderItem->Status = 0;
                $orderItem->Quantity = $cartItem['quantity'];
                $orderItem->SubTotal = $cartItem['item']->Price * $cartItem['quantity'] * 1.03;
                $orderItem->save();
            }
        }
        
        Session::forget('cart');//clrat cart after placing order

        session(['newOrder' => true]);//'neOrder sesssion in adminpage

        return redirect()->back()->with('status', 'Order placed successfully!!');//in counter page
    }
    public function counterLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $counter = DB::table('counters')->where('username', $username)->first();
        if ($counter && password_verify($password, $counter->password)){
            $data= $request->input();
            $request->session()->put('counter_username',$data['username']);
            return redirect('counterpage');
        }else{
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
}
