<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class DeleteApplicationController extends Controller
{
    public function __invoke(Request $request, $id){
        //dd($request);
        $application = Application::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
