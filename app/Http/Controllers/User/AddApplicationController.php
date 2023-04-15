<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AddApplicationController extends BaseController
{
    public function __invoke(Request $request){
        
        $this->service->add_application($request);

        return redirect('/');
    }
}
