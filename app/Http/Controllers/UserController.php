<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Models\Catalogs;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name'=>'required',
            'surname'=>'required',
            'login' => 'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6|max:32',
        ];
        $messages = [
            'name.required' => 'Укажите имя',
            'surname.required' => 'Укажите фамилию',
            'login.required' => 'Укажите логин пользователя',
            'login.unique' => 'Данный логин уже занят',
            'email.required' => 'Укажите почту',
            'email.unique' => 'Данная почта уже занята',
            'password.required' => 'Укажите пароль',
            'password.min' => 'Пароль не может быть меньше 6 символов',
            'password.max' => 'Пароль не можеть быть больше 32 символов',
            'password.confirmed' => 'Пароли не совпадают'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }
        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $user = User::all()->where('login','=',$request->login)->first();
        if($user != null)
        {
            if ($user && Hash::check($request->password, $user->password)){
                Auth::login($user);
                $request->session()->regenerate();
            }
            else {
                return redirect()->route('login')->withErrors('Невернный пароль')->withInput();
            }
        }
        else {
            return redirect()->route('login')->withErrors('Пользователь не найден')->withInput();
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
