<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admins;

class registerController extends Controller
{
    //
    
    function storeData1(Request $request)
    {
        $event = new admins;
        $event->username=$request->username;
        $event->password = Hash::make($request->password);
        $event->save();
        return redirect('adminpage');
}

}
