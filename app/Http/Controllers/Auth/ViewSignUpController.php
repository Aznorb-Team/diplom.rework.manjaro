<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//TODO dwafa

class ViewSignUpController extends Controller
{
    public function __invoke()
    {
        // try {
        //     $dbconnect = DB::connection()->getPDO();
        //     $dbname = DB::connection()->getDatabaseName();
        //     echo "Connected successfully to the database. Database name is :".$dbname;
        //  } catch(Exception $e) {
        //     echo "Error in connecting to the database";
        //  }
        return view('sign_up');
    }
}
