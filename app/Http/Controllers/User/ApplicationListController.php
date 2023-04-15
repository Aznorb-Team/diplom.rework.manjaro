<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationListController extends Controller
{
    public function __invoke(){
        $applications = Application::where('user_id','=',auth()->user()->id)->latest()->paginate(10);

        return view('user.application_list', ['applications' => $applications]);
    }
}
