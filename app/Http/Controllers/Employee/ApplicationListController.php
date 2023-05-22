<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationListController extends Controller
{
    public function __invoke(){
        // dd(auth()->user()->role[0]->id);
        $applications = Application::where('status_application_id','=',auth()->user()->role[0]->id)->latest()->paginate(10);
        return view('employee.application_list', ['applications' => $applications]);
    }
}
