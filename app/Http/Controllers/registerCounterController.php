<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\counters;

class registerCounterController extends Controller
{
    //
    
    function storeData2(Request $request)
    {
        $event = new counters;
        $event->username=$request->username;
        $event->password = Hash::make($request->password);
        $event->save();
        return redirect('counterpage');
}

}
