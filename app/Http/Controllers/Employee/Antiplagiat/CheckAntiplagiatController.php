<?php

namespace App\Http\Controllers\Employee\Antiplagiat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class CheckAntiplagiatController extends Controller
{
    public function __invoke($id){
        $application = Application::where('id','=',$id)->first();
        $application->status_work_id=2;
        $application->employee_id=auth()->user()->id;
        $application->save();
        return view('employee.antiplagiat.check_antiplagiat', ['application'=>$application]);
    }
}
