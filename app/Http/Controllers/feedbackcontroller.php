<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;

class feedbackcontroller extends Controller
{
    //
    public function retrieve2()
    {
        $feeds = feedback::all();
        return view('feedback',compact('feeds'));
    }
    function storeTheData(Request $request)
    {
        $feed = new feedback;
        $feed->username=$request->username;
        $feed->Itemname=$request->Itemname;
        $feed->rating=$request->rating;
        $feed->comment=$request->comment;
        $feed->save();
        return redirect()->back()->with('status', 'Item added successfully!!');
        //return redirect('adpage');
    }
}
