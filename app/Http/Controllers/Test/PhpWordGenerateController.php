<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PhpWordGenerateController extends Controller
{
    public function __invoke(Request $request){

        // dd($request);
        $user = auth()->user();
        $folder = "public/application/user-{$user->id}";
        if($request->hasFile('file')){
            $fileTech = $request->file('file')->storeAs(
                $folder, $user->id.'.docx'
            );;
        }

        // $template = new \PhpOffice\PhpWord\TemplateProcessor(base_path().'/'.$fileTech);
        $template = new \PhpOffice\PhpWord\TemplateProcessor("file:///home/sergey/srv/http/diplom.rework/public/storage/statements/ris.docx");
        $template->setValue('{name}', $request->name);
        $template->setValue('{job_title}', $request->job_title);
        $template->setValue('{chair}', $request->chair);
        $template->setValue('{mode}', $request->mode);
        $template->setValue('{title}', $request->title);
        $template->setValue('{authors}', $request->authors);
        $template->setValue('{direction}', $request->direction);
        $template->setValue('{pages}', $request->pages);
        $template->setValue('{date_of_issue}', $request->date_of_issue);
        $template->setValue('{date_today}', $request->date_today);
        $template->saveAs("file:///home/sergey/srv/http/diplom.rework/public/storage/application/user-{$user->id}/statement_ris.docx");

        return Storage::download("public/application/user-{$user->id}/statement_ris.docx");

        // return redirect()->route('user');
    }
}
