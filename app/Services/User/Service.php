<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\Certificate_Of_Department;
use App\Models\Application;
use App\Models\Review;
use App\Models\Teaching_Material;

class Service{
    public function add_application($request){
        $user = auth()->user();
        $folder = "application/user-{$user->id}";
        $fileTech = '';
        $recense = collect([]);
        $kafedra = '';
        if($request->hasFile('teach_mat')){
            $fileTech = $request->file('teach_mat')->store($folder);
        }
        if($request->hasFile('recense')){
            foreach($request->file('recense') as $file){
                $recense->push($file->store($folder));
            }
            //$recense = $request->file('recense')->store($folder);
        }
         //dd($recense);
         if($request->hasFile('kafedra')){
            $kafedra = $request->file('kafedra')->store($folder);
        }
        $teach = Teaching_Material::create([
            'title' => 'teaching_mat'.$user->id,
            'link' => $fileTech
        ]);
        $teach->save();

        $cert = Certificate_Of_Department::create([
            'title' => 'certificate_of_department'.$user->id,
            'link' => $kafedra
        ]);
        $cert->save();

        $application = Application::create([
            'title' => $request->title,
            'user_id' => $user->id,
            'status_application_id' => 2,
            'mode_id' => $request->mode,
            'type_id' => $request->type,
            'direction_id' => $request->direction,
            'teaching_materials_id' => $teach->id,
            'certificate_of_department_id' => $cert->id,
            'status_work_id' => 1,
        ]);
        //dd($application);
        $application->save;

        foreach($recense as $link){
            $rec = Review::create([
                'link' => $link,
            ]);
            $rec->save();
            $application->reviews()->attach($rec);
        }
        foreach($request->authors as $author){
            $application->authors()->attach($author);
        }
    }
}

?>