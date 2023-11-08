<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(url()->previous());
        }

        Session::put('urlBefore', url()->previous());

        $categories = Category::all();

        return view('auth.login')->with('categories', $categories);
        ;
    }

    public function customLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect(url()->previous());
        }
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (url()->previous() != url()->current()) {
                return redirect(Session::get('urlBefore', ''))->with([
                    'message' => 'Successful authorization'
                ]);
            }
            return redirect('')->with([
                'message' => 'Successful authorization'
            ]);
        }

        return redirect("login")->withErrors(['auth' => 'Login details are not valid']);
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect(url()->previous());
        }

        Session::put('urlBefore', url()->previous());

        $categories = Category::all();

        return view('auth.registration')->with('categories', $categories);

    }

    public function customRegistration(Request $request)
    {
        if (Auth::check()) {
            return redirect('');
        }
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|unique:users'
        ]);
        $data = $request->all();
        $check = $this->create($data);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (url()->previous() != url()->current()) {
                return redirect(Session::get('urlBefore', ''))->with([
                    'message' => 'Successful authorization'
                ]);
            }
            return redirect('')->with([
                'message' => 'Successful authorization'
            ]);
        }

        return redirect("");
    }

    public function create(array $data)
    {
        return User::create([
            'name' => 'User',
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
