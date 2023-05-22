<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Direction;
use Illuminate\Support\Facades\DB;

class SaveUserListController extends Controller
{
    public function __invoke(Request $request){

        // dd($request->directions);
        foreach($request->user as $user){
            $u = User::where('id', '=', $user['id'])->first();
            DB::table('users_roles')->where('user_id', '=', $user['id'])->delete();
            if($request->roles != null)
                if(array_key_exists($user['id'], $request->roles)){
                    
                    foreach($request->roles[$user['id']] as $role){
                        $u->role()->attach($role);
                    }
                }
                DB::table('users_directions')->where('user_id', '=', $user['id'])->delete();
            if($request->directions != null)
                if(array_key_exists($user['id'], $request->directions)){
                    
                    foreach($request->directions[$user['id']] as $direction){
                        $u->direction()->attach($direction);
                    }
                }
            
            $u->save();
        }

        return redirect('/admin/user.list');
    }
}
