<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use ZipArchive;

class CreateZipController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd(public_path());
        // // dd(substr($request->link_teach_mat,7));
        // // if($request->has('download')) {
        // 	// Define Dir Folder
        // 	$public_dir=public_path();
        //     // dd($public_dir);
        // 	// Zip File Name
        //     $zipFileName = 'AllDocuments.zip';
        //     // Create ZipArchive Obj
        //     $zip = new ZipArchive;
            
        //     $zip->open($public_dir . '/' . 'application/user-2/', ZipArchive::CREATE);
        //     foreach($request->query as $link){
        //         // Close ZipArchive     
        //         // dd($link);
        //         // dd($public_dir . '/' . substr($link,7));
        //         $zip->addFile('file://' . $public_dir . '/' . substr($link,7),substr($link,-7));
        //     }
        //     $zip->close();
        //     $headers = array(
        //         'Content-Type' => 'application/octet-stream',
        //     );
        //     $filetopath=$public_dir.'/'.$zipFileName;
        //     // Create Download Response
        //     if(file_exists($filetopath)){
        //         return response()->download($filetopath,$zipFileName,$headers);
        //     }
        $zip = new ZipArchive;
   
        $fileName = 'zipFileName.zip';
   
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
        	// Folder files to zip and download
        	// files folder must be existing to your public folder
            $files = File::files(public_path('storage/application/user-'.$request->id_user.'/'));
   			
   			// loop the files result
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    	
    	// Download the generated zip
        return response()->download(public_path($fileName));
        // }
    }
}
