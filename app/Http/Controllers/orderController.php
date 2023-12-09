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

class orderController extends Controller
{
    //
    public function index()
    {
        $item = menu::all();
        $cumulativeTotal = $this->calculateCumulativeTotal(session('cart', []));
        return view('orderpage',compact('item','cumulativeTotal'));
    }
 
    public function addToCart1(Request $request, $Itemid)
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
            session()->push('cart', ['item' => $item,'quantity' => $quantity,'image' => asset('uploads/event/' . $item->Itemimage)]);
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
    public function clearCart1()
    {
        Session::forget('cart');
        return redirect()->back()->with('status', 'Cart cleared successfully!!');
    }
    public function saveOrder1()
    {
        
        $userId = 1; // for now let it be constant
        $cumulativeTotal = $this->calculateCumulativeTotal(session('cart', []));
        //  new order in the 'orders' table
        $order = new orders();
        $order->Userid = $userId;
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

        $orderItemsDetails = order_item::where('Orderid', $orderId)
        ->join('menu', 'order_item.Itemid', '=', 'menu.Itemid')
        ->select('menu.Itemname', 'menu.Price', 'order_item.Quantity', 'order_item.SubTotal')
        ->get();
        
        Session::forget('cart');//clrat cart after placing order

        session(['newOrder' => true]);//'neOrder sesssion in adminpage
        $totalAmt = orders::where('Orderid', $orderId)->value('TotalAmt');
        
        
        
        return view('payment', ['totalAmt' => $totalAmt,'orderItemsDetails' => $orderItemsDetails])->with('status', 'Proceed with payment!!');

    }
}
