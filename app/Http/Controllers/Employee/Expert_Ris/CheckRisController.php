<?php

namespace App\Http\Controllers\Employee\Expert_Ris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Survey;

class CheckRisController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        $survey = null;
        if($application->mode_id == 3){
            $survey = Survey::where('id', '=', 2)->get()->first();
            //return view('employee/ris/check_monograph',['application'=>$application, 'survey'=>$survey]);
        }else{
            $survey = Survey::where('id', '=', 1)->get()->first();
            //return view('employee/ris/check_educational',['application'=>$application, 'survey'=>$survey]);
        }
        return view('employee.expert_ris.check_ris', ['application'=>$application, 'survey'=>$survey]);
    }
}
