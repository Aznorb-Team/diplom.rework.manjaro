<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;

class DirectionListController extends Controller
{
    public function __invoke(){
        $directions = Direction::paginate(15);

        return view('admin.direction_list', ['directions' => $directions]);
    }
}
