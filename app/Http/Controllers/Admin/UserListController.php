<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Direction;

class UserListController extends Controller
{
    public function __invoke(){
        $users = User::paginate(15);
        $roles = Role::get();
        $directions = Direction::get();

        return view('admin.user_list', ['users' => $users, 'roles'=>$roles, 'directions'=>$directions]);
    }
}
