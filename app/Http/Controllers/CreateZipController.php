<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class CreateZipController extends Controller
{
    public function __invoke(Request $request)
    {
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

            $zip = new \ZipArchive();
            $fileName = 'zipFile.zip';
            if ($zip->open(public_path($fileName), \ZipArchive::CREATE)== TRUE)
            {
                $files = File::files(public_path('application/user-2/'));
                foreach ($files as $key => $value){
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
                }
                $zip->close();
            }
            return response()->download(public_path($fileName));
        // }
    }
}
