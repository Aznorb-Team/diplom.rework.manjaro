<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class SaveFormController extends Controller
{
    public function __invoke(Request $request){

        // dd($request->html_code);

        $dom = new Dom;
        $dom->loadStr($request->html_code);
        $a = $dom->find('button');
        foreach($a as $d){
            dd($d->value);
        }
        

        dd($a);
        return redirect('/admin');
    }
}
