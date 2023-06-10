<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Ris_Votes;
use App\Models\Ums_Votes;
use Illuminate\Support\Facades\DB;

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

        foreach($applications as $key=>$value){
            $ris = Ris_Votes::where('application_id', '=', $value->id)->first();
            if($ris != null)
                if(DB::table('who_voted_ris')->where('employee_id', '=', auth()->user()->id)->where('ris_vote_id', '=', $ris->id)->first() != null)
                    $applications->forget($key);
        }
        foreach($applications as $key=>$value){
            $ums = Ums_Votes::where('application_id', '=', $value->id)->first();
            if($ums != null)
                if(DB::table('who_votes_ums')->where('employee_id', '=', auth()->user()->id)->where('ums_vote_id', '=', $ums->id)->first() != null)
                    $applications->forget($key);
        }
        // $applications = $applications->latest()->paginate(10);
        //dd($applications);
        return view('employee.application_list')->with(['applications' => $applications]);
    }
}
