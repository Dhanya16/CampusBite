<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    //
    public function userLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = DB::table('users')->where('email', $email)->first();
        if ($user && password_verify($password, $user->password)){
            $data= $request->input();
            $request->session()->put('email',$data['email']);
            return redirect('index');
        }else{
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
}
