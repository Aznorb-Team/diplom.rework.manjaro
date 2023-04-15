<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexViewController extends Controller
{
    public function __invoke()
    {
        if(Auth::check())
            switch(auth()->user()->role_id){
                case 0: 
                    return redirect('/admin');
                    break;
                case 1: 
                    return redirect('/user');
                    break;
                default:
                    return redirect('/user');
                    break;
            }
        else
            return redirect('log_in');
    }
}
