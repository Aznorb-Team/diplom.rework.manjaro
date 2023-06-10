<?php

namespace App\Http\Controllers\Employee\Session_Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Ums_Votes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Statement;

class SuccessController extends Controller
{
    public function __invoke($id){
        $vote = Ums_Votes::where('application_id', '=', $id)->first();

        if($vote == null){
            $vote = Ums_Votes::create([
                'success_count' => 1,
                'unsuccess_count' => 0,
                'application_id' => $id,
            ]);
            $application = Application::where('id','=',$id)->first();
        
            $application->employee_id = NULL;
            $application->save();
            $application->status_work_id = 1;
        }else{
            $vote->success_count = $vote->success_count + 1;
            

            if($vote->success_count+$vote->unsuccess_count == 6){
                if($vote->success_count>$vote->unsuccess_count){
                    $application = Application::where('id','=',$id)->first();

                    $application->status_application_id = 7;
            
                    $application->status_work_id = 1;
                    $application->employee_id = NULL;

                    $application->save();

                }else{
                    $application = Application::where('id','=',$id)->first();
                    $application->status_application_id = 1;

                    $application->status_work_id = 1;
                    $application->employee_id = NULL;
                    $application->save();
                }
                
            }else{
                $application = Application::where('id','=',$id)->first();
        
                $application->status_work_id = 1;
                $application->employee_id = NULL;
                $application->save();
            }
        } 
        $vote->employee_vote()->attach(auth()->user());
        $vote->save();

        return redirect('user/antiplagiat.application_list');
    }
}
