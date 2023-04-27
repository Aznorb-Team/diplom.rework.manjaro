<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexViewController extends Controller
{
    public function __invoke()
    {
        
        if(Auth::check())
        {
            $roles = auth()->user()->role->sortBy('id');

            switch($roles[0]->id){
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
        }
        else
            return redirect('log_in');
    }
}
