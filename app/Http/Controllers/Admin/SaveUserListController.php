<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Direction;

class SaveUserListController extends Controller
{
    public function __invoke(Request $request){
        foreach($request->user as $user){
            $u = User::where('id', '=', $user['id'])->first();
            $u->role_id = $user['role_id'];
            $u->direction_id = $user['direction_id'];
            $u->save();
        }

        return redirect('/admin/user.list');
    }
}
