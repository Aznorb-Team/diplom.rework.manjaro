<?php

namespace App\Http\Controllers\Employee\Session_Ris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Ris_Votes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Statement;

class SuccessController extends Controller
{
    public function __invoke($id){
        
        $vote = Ris_Votes::where('application_id', '=', $id)->first();

        if($vote == null){
            $vote = Ris_Votes::create([
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

                    $application->status_application_id = 5;
            
                    $application->status_work_id = 1;
                    $application->employee_id = NULL;

                    #Заявление на УМС
                    $user = User::where('id', '=', $application->user_id)->first();

                    $template = new \PhpOffice\PhpWord\TemplateProcessor("file:///home/sergey/srv/http/diplom.rework/public/storage/statements/ums.docx");
                    $template->setValue('{name}', $user->surname.' '.$user->name.' '.$user->patronymic);
                    $template->setValue('{job_title}', "Должность");
                    $template->setValue('{chair}', 'Кафедра');
                    $template->setValue('{phone_number}', 'Номен телефона');
                    $template->setValue('{mode}', $application->mode->title);
                    $template->setValue('{title}', $application->title);
                    $template->setValue('{authors}', $application->authors->implode('-'));
                    $template->setValue('{direction}', $application->direction);
                    $template->setValue('{pages}', 'Страницы');
                    $template->setValue('{date_today}', 'Сегодняшняя дата');
                    $template->saveAs("file:///home/sergey/srv/http/diplom.rework/public/storage/application/user-{$user->id}/statement_ums.docx");

                    $link_statement = "file:///home/sergey/srv/http/diplom.rework/public/storage/application/user-{$user->id}/statement_ums.docx";

                    $state = Statement::create([
                        'link' => "application/user-{$user->id}/statement_ums.docx",
                    ]);
                    $state->save();

                    $application->ums_statement_id = $state->id;

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
