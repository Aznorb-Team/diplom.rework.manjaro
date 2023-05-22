<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Mode;
use App\Models\Type;
use App\Models\Direction;
use App\Models\User;

class EditApplicationController extends Controller
{
    public function __invoke(Request $request, $id){
        //dd($request);
        $application = Application::where('id', '=', $id)->first()->get();
        $modes = Mode::get();
        $types = Type::get();
        $directions = Direction::get();
        $authors = User::get();
        return view('user.edit_application', ['application'=>$application[0], 'modes'=>$modes, 'types'=>$types, 'directions'=>$directions, 'authors'=>$authors]);
    }
}
