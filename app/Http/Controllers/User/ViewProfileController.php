<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewProfileController extends Controller
{
    public function __invoke(){
        return view('user.profile');
    }
}
