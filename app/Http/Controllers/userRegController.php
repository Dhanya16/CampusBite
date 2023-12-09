<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\users;

class userRegController extends Controller
{
    //
    
    function storeData(Request $request)
    {
        $event = new users;
        $event->fname=$request->fname;
        $event->lname=$request->lname;
        $event->email=$request->email;
        $event->password = Hash::make($request->password);
        $event->save();
        return redirect('index');
}

}