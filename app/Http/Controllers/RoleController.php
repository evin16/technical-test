<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('role.index', ['user' => $user]);
    }

    public function insert()
    {
        return view('role.insert');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->admin = 0;
        $user->save();

        return redirect()->route('role.index')->with('status', 'User has been added');
    }

    public function edit(Request $request, $id)
    {
        $users = User::find($id);
        return view('role.edit', compact('users'));
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->admin = $request->input('admin');
        $asset->update();

        return redirect()->route('role.index')->with('status', 'User has been update');
    }

}
