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
    public function index(Request $request)
    {
        $categories = Category::all();
        $user = $request->user();
        return view('landing.main')->with([
            'categories' => $categories,
            'user' => $user
        ]);
    }
}
