<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,penyewa'], // Menambahkan validasi role
        ]);
    }

    protected function create(array $data)
    {
        // Menambahkan kolom role pada data yang akan disimpan
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'], // Menyimpan role
        ]);
    }

    // Override method registered() dari RegistersUsers trait
    protected function registered(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('cars.index');
        } elseif ($user->role === 'penyewa') {
            return redirect()->route('cars1.index');
        } else {
            return redirect($this->redirectTo);
        }
    }
}

