<?php

namespace App\Http\Controllers\Employee\Expert_Ris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\App_Survey;

class SuccessController extends Controller
{
    public function __invoke(Request $request, $id, $survey_id){
        //dd($request);
        foreach($request->collect() as $key => $part){
            if (is_numeric($key)) {
                $app_survey = App_Survey::create([
                    'application_id' => $id,
                    'survey_id' => $survey_id,
                    'question_id' => $key,
                    'result' => $part,
                ]);
                $app_survey->save();
            }
        }
        $application = Application::where('id','=',$id)->first();

        $application->status_application_id = 4;

        $application->status_work_id = 1;
        $application->employee_id = NULL;
        $application->save();

        return redirect('user/antiplagiat.application_list');
    }
}
