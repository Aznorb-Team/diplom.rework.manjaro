<?php

namespace App\Http\Controllers\Employee\Expert_Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Survey;

class CheckUmsController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        $survey = Survey::where('id', '=', 3)->get()->first();
        return view('employee.expert_ums.check_ums', ['application'=>$application, 'survey'=>$survey]);
    }
}
