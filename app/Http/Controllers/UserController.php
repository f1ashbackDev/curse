<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        User::create([
            'surname' => 'test',
            'name' => 'test',
            'login' => 'test',
            'email' => 'test@test',
            'password' => '31231231',
        ]);
    }
}
