<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login')->with('mensaje','usuario registrado con exito por favor ingrese sus credenciales para iniciar sesion');
    }

    public function login()
    {
        if(Auth::check())
        {
            return redirect('/inicio');
        }

        return view('Auth.login');
    }

    public function storeLogin (LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json([
                'Errors' => ['Unathorized']
            ],401);
        }

        $user = User::Where('email',$request->email)->first();
        Auth::login($user);

        return redirect('/inicio');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
