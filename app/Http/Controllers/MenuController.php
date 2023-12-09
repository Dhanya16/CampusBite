<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\order_item;
use App\Models\inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    //
    public function index()
    {
        $items = menu::where('delete','!=',0)->get();
        $orders = order_item::all();
        $inventory = inventory::all();
        return view('adminpage',compact('items','orders','inventory'));
    }

    public function index1()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category1',compact('filteredItems'));
    }

    public function index2()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category2',compact('filteredItems'));
    }

    public function index3()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category3',compact('filteredItems'));
    }

    public function index4()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category4',compact('filteredItems'));
    }

    public function index5()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category5',compact('filteredItems'));    }

    public function index6()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category6',compact('filteredItems'));    }

    public function index7()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category7',compact('filteredItems'));    }

    public function index8()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category8',compact('filteredItems'));    }

    public function index9()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category9',compact('filteredItems'));    }

    public function index10()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category10',compact('filteredItems'));    }

    public function index11()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category11',compact('filteredItems'));    }

    public function index12()
    {
        $items = menu::all();
        $availableItemIds = inventory::where('Availability', '!=', 0)->pluck('Itemid');
        $filteredItems = $items->whereIn('Itemid', $availableItemIds);
        return view('category12',compact('filteredItems'));    }

    function storeData(Request $request)
    {
        $item = new menu;
        $item->Itemid=$request->Itemid;
        $item->Itemname=$request->Itemname;
        $item->Price=$request->Price;
        $item->Category=$request->Category;
        if ($request->hasFile('Itemimage')) {
            $file = $request->file('Itemimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/event/',$filename);
            $item->Itemimage = $filename;
            //$imagePath = $request->file('image')->store('images', 'public');
            //$event->image = $imagePath;
        }
        $item->Description=$request->Description;
        $item->updated_at=$request->updated_at;
        $item->created_at=$request->created_at;
        $item->save();
        $item = new inventory;
        $item->Itemid = $request->Itemid;
        $item->save();
        return redirect()->back()->with('status', 'Item added successfully!!');
        //return redirect('adpage');
    }
    public function removeItem($id)
    {
        $item = menu::where('Itemid', $id)->first();
        if ($item) {
            $item->delete = 0;
            inventory::where('Itemid', $id)->delete();
            $item->save();
        }
        return redirect()->back()->with('status', 'Item removed successfully!!');
    }

    public function addItem(Request $request)
    {
        $itemId = $request->input('ItemId');
        $item = menu::where('Itemid', $itemId)->first();

        if ($item) {
            $item->delete = 1;
            $item->save();
            $items = new inventory;
            $items->Itemid = $request->ItemId;
            $items->save();
            return redirect()->back()->with('status', 'Item added successfully!!');
        }
        else{
            return redirect()->back()->with('status', 'Could not find item!!');
        }

        
    }
    public function updateAvailability($Itemid,Request $request)
    {
        $inventory = inventory::where('Itemid', $Itemid)->first();
    
        if ($inventory) {
            $availability = $request->has('availability') ? 1 : 0;
    
            $inventory->update([
                'Availability' => $availability,
            ]);
        }
    
        return redirect()->back();
    }


    public function updateOrderStatus($Orderitemid, Request $request)
    {
        $orderItem = order_item::where('Orderitemid', $Orderitemid)->first();
        if (!$orderItem) {
            return redirect()->back()->with('error', 'Order item not found.');
        }

        $updatedtatus=$request->has('status')? 1 : 0 ;
        $orderItem->update([
            'Status' => $updatedtatus,
        ]);

        if($updatedtatus) {
            session(['collectOrder' => true]);
            order_item::where('Orderitemid', $Orderitemid)->delete();
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    
}
