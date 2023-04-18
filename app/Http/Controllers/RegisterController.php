<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6' //con la regla ''confirmed'' comparamos con el campo de repetir la password
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) //ciframos la contraseña
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);


        return redirect()->route('index',  ['user' => auth()->user()->name]);
    }
}
