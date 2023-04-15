<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;

class ViewApplicationController extends Controller
{
    public function __invoke($id){
        $applications = Application::where('status_application_id','=',$id)->latest()->paginate(10);
        $users = collect();
        foreach($applications as $application){
            $name = User::where('id', '=', $application->user_id)->first();
            $users->put($application->user_id, $name);
        }
        //$checking = User::where('status_user', '=', $id)->get();
        return view('admin.view_application', ['applications'=>$applications, 'users'=>$users]);
    }
}
