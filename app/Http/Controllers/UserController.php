<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('user.login');
    }

    public function reg() {
        return view('user.reg');
    }

    public function auth(Request $request) {
        if($user = User::where('email', $request->email)->first() and Hash::check($request->password,$user->password)) {
            Auth::login($user);
            if (Auth::user()->role==1) return redirect()->route('admin.index');
            return redirect()->route('calculations.index');
        }
        return back()->withErrors('Неверный email или пароль');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('main');
    }

    public function store(UserRegisterRequest $request) {


        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        if($user) {
            return redirect()->route('login');
        }
        return back()->withErrors('Ошибка сохранения');
    }

}
