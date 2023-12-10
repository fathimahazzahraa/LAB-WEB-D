<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function index1()
    {
        $users = User::all();
        return view('penyewa.user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }
    public function create1()
    {
        return view('penyewa.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            // Add other validations as needed
        ]);
    
        User::create($request->all());
    
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }
    public function store1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            // Add other validations as needed
        ]);
    
        User::create($request->all());
        
    
        return redirect()->route('users1.index')
            ->with('success', 'User created successfully.');
    }
    

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.index', ['users' => User::all(), 'userToEdit' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            // Add other validations as needed
        ]);
    
        $user = User::findOrFail($id);
        $user->update($request->all());
    
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
