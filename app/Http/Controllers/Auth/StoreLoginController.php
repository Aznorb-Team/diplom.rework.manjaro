<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreLoginController extends Controller
{
    public function __invoke(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            //dd(auth()->user()->role_title);
            return redirect('admin');    
        }
        //return redirect()->back()->with('error', $request->password);
    }
}
