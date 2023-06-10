<?php

namespace App\Http\Controllers\Publish;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class CheckPublishController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        return view('employee.publish.check_publish', ['application'=>$application]);
    }
}
