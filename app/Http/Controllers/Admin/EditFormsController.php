<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Form;
use App\Models\Field;

class EditFormsController extends Controller
{
    public function __invoke(){
        $stages = Stage::orderBy('order_num', 'asc')->get();
        $forms = Form::orderBy('id', 'asc')->get();
        $fields = Field::orderBy('id', 'asc')->get();
        return view('admin.edit_forms', ['stages'=>$stages, 'forms'=>$forms, 'fields'=>$fields]);
    }
}
