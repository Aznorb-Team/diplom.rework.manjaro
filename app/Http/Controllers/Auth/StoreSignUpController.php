<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreSignUpController extends Controller
{
    public function __invoke(Request $request){
        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            'direction_id' => 0,
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
