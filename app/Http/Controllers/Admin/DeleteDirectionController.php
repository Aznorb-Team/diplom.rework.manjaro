<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;

class DeleteDirectionController extends Controller
{
    public function __invoke(Request $request, $id){
        //dd($request);
        $direction = Direction::where('id', '=', $id)->delete();
        return redirect("admin/direction.list");
    }
}
