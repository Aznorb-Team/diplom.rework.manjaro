<?php

namespace App\Http\Controllers\Employee\Session_Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\App_Survey;

class CheckSessionUmsController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        $app_survey = App_Survey::where('application_id', '=', $application->id)->get();
        return view('employee.session_ums.check_session_ums', ['application'=>$application, 'app_survey'=>$app_survey]);
    }
}
