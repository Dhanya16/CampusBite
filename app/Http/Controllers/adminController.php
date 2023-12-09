<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\admins;
use App\Models\menu;
use App\Models\order_item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class adminController extends Controller
{
    //
    
    public function adminLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $admin = DB::table('admins')->where('username', $username)->first();
        if ($admin && password_verify($password, $admin->password)){
            $data= $request->input();
            $request->session()->put('admin_username',$data['username']);
            return redirect('adminpage');
        }else{
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
}
