<?php

namespace App\Http\Controllers\Employee\Antiplagiat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Anti_Plagiarism;

class SuccessController extends Controller
{
    public function __invoke(Request $request, $id){
        $application = Application::where('id','=',$id)->first();
        //dd($request);
        $folder = "application/user-{$application->user_id}";
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
        $application->save();

        return redirect('user/antiplagiat.application_list');
    }
}
