<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('index');
        }
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('index');
        }
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withErrors(['auth' => 'Login details are not valid']);
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect('index');
        }
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        if (Auth::check()) {
            return redirect('index');
        }
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|unique:users'
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect("index")->withSuccess('You are not allowed to access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => 'Nikita',
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}