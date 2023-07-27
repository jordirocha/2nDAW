<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class UserController extends Controller
{
    public function login()
    {
        $title_name = "Iniciar Sesión";
        return view('login', compact('title_name'));
    }

    public function register()
    {
        $title_name = "Registrarse";
        return view('register', compact('title_name'));
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nickname' => 'required|max:70',
            'password' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->password = Hash::make($request->password);
        $user->save();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('inicio');
        }

        return redirect('register');
    }

    public function loggingUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index');
            // return view('index');
        }

        return redirect('login');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('inicio');
    }

}
