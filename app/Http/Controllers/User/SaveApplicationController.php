<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Certificate_Of_Department;
use App\Models\Application;
use App\Models\Review;
use App\Models\Teaching_Material;

class SaveApplicationController extends Controller
{
    public function __invoke(Request $request, $id){
        // dd($request);
        $application = Application::where('id','=',$id)->get()->first();;

        $application->title = $request->title;
        $application->mode_id = $request->mode;
        $application->type_id = $request->type;
        $application->direction_id = $request->direction;

        $user = auth()->user();
        $folder = "public/application/user-{$user->id}";

        if($request->hasFile('teach_mat')){
            $fileTech = $request->file('teach_mat')->store($folder);
            $application->teaching_materials->link = $fileTech;
        }
        if($request->hasFile('recense')){
            DB::table('applications_reviews')->where('application_id', '=', $id)->delete();
            foreach($request->file('recense') as $file){
                $recense->push($file->store($folder));
            }
        }
        
        if($request->hasFile('kafedra')){
            $kafedra = $request->file('kafedra')->store($folder);
            $application->certificate_of_departments->link = $kafedra;
        }

        $application->save();

        if($request->hasFile('recense')){
            foreach($recense as $link){
                $rec = Review::create([
                    'link' => $link,
                ]);
                $rec->save();
                $application->reviews()->attach($rec);
            }
        }
        DB::table('applications_authors')->where('application_id', '=', $id)->delete();
        foreach($request->authors as $author){
            $application->authors()->attach($author);
        }

        return redirect()->route('application.list');
    }
}
