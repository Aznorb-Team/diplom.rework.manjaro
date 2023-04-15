<?php

namespace App\Http\Controllers\Employee\Expert_Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class UnSuccessController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_application_id = 1;

        $application->status_work_id = 1;
        $application->employee_id = NULL;
        $application->save();

        return redirect('user/antiplagiat.application_list');
    }
}
