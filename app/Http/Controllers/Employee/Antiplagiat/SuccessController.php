<?php

namespace App\Http\Controllers\Employee\Antiplagiat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Anti_Plagiarism;
use App\Models\Statement;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class SuccessController extends Controller
{
    public function __invoke(Request $request, $id){
        $application = Application::where('id','=',$id)->first();
        //dd($request);
        $folder = "public/application/user-{$application->user_id}";
        $link = "";
        if($request->hasFile('antiplagiat')){
            $link = $request->file('antiplagiat')->store($folder);
        }
        $anti = Anti_Plagiarism::create([
            'link' => $link,
            'borrowing' =>$request->borrowing,
            'citation' =>$request->citation,
            'originality' =>$request->originality,
        ]);
        $anti->save();

        $application->anti_plagiarism_id = $anti->id;
        $application->status_application_id = 3;

        $application->status_work_id = 1;
        $application->employee_id = NULL;

        //Заявление на РИС 
        $user = User::where('id', '=', $application->user_id)->first();

        $template = new \PhpOffice\PhpWord\TemplateProcessor("file:///home/sergey/srv/http/diplom.rework/public/storage/statements/ris.docx");
        $template->setValue('{name}', $user->surname.' '.$user->name.' '.$user->patronymic);
        $template->setValue('{job_title}', "Должность");
        $template->setValue('{chair}', 'Кафедра');
        $template->setValue('{mode}', $application->mode->title);
        $template->setValue('{title}', $application->title);
        $template->setValue('{authors}', $application->authors->implode('-'));
        $template->setValue('{direction}', $application->direction->title);
        $template->setValue('{pages}', 'Страницы');
        $template->setValue('{date_of_issue}', 'Год выпуска');
        $template->setValue('{date_today}', 'Сегодняшняя дата');
        $template->saveAs("file:///home/sergey/srv/http/diplom.rework/public/storage/application/user-{$user->id}/statement_ris.docx");

        $link_statement = "file:///home/sergey/srv/http/diplom.rework/public/storage/application/user-{$user->id}/statement_ris.docx";

        $state = Statement::create([
            'link' => "application/user-{$user->id}/statement_ris.docx",
        ]);
        $state->save();

        $application->ris_statement_id = $state->id;
        
        $application->save();

        return redirect('user/antiplagiat.application_list');
    }
}
