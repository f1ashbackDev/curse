<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
//    public function ewqdas()
//    {
//        Auth::guard()->user()->name
//    }
    public function indexPage()
    {
        // Пока хз как фиксануть
//        if(Auth::guard('user')->check()){
//            return view('index')->layout('pages.header')->with([
//                'name'=>Auth::user()->name
//            ]);
//        }
        return view('index');
    }
    public function register(Request $request)
    {
        $response = [];
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);
        if ($validator->fails()){
            $response = [
                'success'=>false,
                'message'=>$validator->errors()
            ];
        }
        else {
            $user = new User();
            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->login = $request->login;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                $request->session()->regenerate();
                Auth::login($user);
            }
        }
        return redirect('/');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $response = [];
        $validator = Validator::make($input,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validator->fails()){
            $response = [
                'success'=>false,
                'message'=>$validator->errors()
            ];
        }
        $user = User::all()->where('login','=',$request->login)->first();
        if (!$user){
            return redirect('/error')->with([
                'errors'=>"Нет такого пользователя",
            ]);
        }
        if ($user && Hash::check($request->password, $user->password)){
            Auth::guard('user')->login($user);
            $request->session()->regenerate();
        }
        else{
            return redirect('/error')->with([
                'errors'=>"Неправильный пароль",
            ]);
        }
        return redirect('/index');
    }
}
