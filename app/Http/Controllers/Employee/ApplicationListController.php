<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationListController extends Controller
{
    public function __invoke(){
        // dd(auth()->user()->role[0]->id);
        
        // $applications = Application::where('status_application_id', '=', auth()->user()->role->each(function (int $item, int $key){
        //     if($key === "id")
        //         return $item;
        // }))->latest()->paginate(10);
        // dd($applications);
        $applications = collect();
        foreach(auth()->user()->role as $role){
            $app = Application::where('status_application_id','=',$role->id)->get();
            $applications = $applications->merge($app);
        }
        // $applications = $applications->latest()->paginate(10);
        //dd($applications);
        return view('employee.application_list')->with(['applications' => $applications]);
    }
}
