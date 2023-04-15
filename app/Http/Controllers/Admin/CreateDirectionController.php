<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;


class CreateDirectionController extends Controller
{
    public function __invoke(Request $request){
        //dd($request);
        $direction = Direction::create([
            'title' => $request->new_direction,
        ]);
        $direction->save();

        return redirect("admin/direction.list");
    }
}
