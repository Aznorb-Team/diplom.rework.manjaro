<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;

class EditStepsController extends Controller
{
    public function __invoke(){
        $stages = Stage::orderBy('order_num', 'asc')->get();
        return view('admin.edit_steps', ['stages'=>$stages]);
    }
}
