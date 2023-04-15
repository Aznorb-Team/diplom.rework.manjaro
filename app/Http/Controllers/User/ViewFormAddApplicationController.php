<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mode;
use App\Models\Type;
use App\Models\Direction;
use App\Models\User;

class ViewFormAddApplicationController extends Controller
{
    public function __invoke(){
        $modes = Mode::get();
        $types = Type::get();
        $directions = Direction::get();
        $authors = User::get();

        return view('user.form_add_application', ['modes'=>$modes, 'types'=>$types, 'directions'=>$directions, 'authors'=>$authors]);
    }
}
