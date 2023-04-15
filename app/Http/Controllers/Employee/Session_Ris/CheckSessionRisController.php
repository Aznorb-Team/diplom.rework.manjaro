<?php

namespace App\Http\Controllers\Employee\Session_Ris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\App_Survey;

class CheckSessionRisController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        $app_survey = App_Survey::where('application_id', '=', $application->id)->get();
        //dd($survey[0]->result);
        return view('employee.session_ris.check_session_ris', ['application'=>$application, 'app_survey'=>$app_survey]);
    }
}
