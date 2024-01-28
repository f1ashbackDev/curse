<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers()
    {
        return view('new_admin.users', [
            'users' => User::all()
        ]);
    }

    public function showUpdateUser($id)
    {
        $user = User::all()->where('id', '=', $id);
        return view('new_admin.editUsers', [
            'user' => $user
        ]);
    }

    public function updateUsers(Request $request, $id)
    {
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/admin/users');
    }
}
