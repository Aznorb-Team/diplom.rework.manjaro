<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class SaveFormController extends Controller
{
    public function __invoke(Request $request){

        dd($request->form_id);

        $dom = new Dom;
        $dom->loadStr($request->html_code);
        $a = $dom->find('input');
        foreach($a as $d){
            dd($d->type);
        }
        

        dd($a);
        return redirect('/admin');
    }
}
