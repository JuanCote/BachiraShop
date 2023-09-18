<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('auth.login');
        }

        $categories = Category::all();

        Log::info(@$categories);

        return view('landing.landing')->with('categories', $categories);
    }
}