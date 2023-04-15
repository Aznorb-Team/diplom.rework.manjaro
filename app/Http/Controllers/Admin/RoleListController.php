<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleListController extends Controller
{
    public function __invoke(){
        $roles = Role::paginate(15);

        return view('admin.role_list', ['roles' => $roles]);
    }
}
