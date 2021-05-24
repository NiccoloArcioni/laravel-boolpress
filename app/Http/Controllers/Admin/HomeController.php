<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }
    public function profile()
    {
        return view('admin.user.profile');
    }

    public function generateToken()
    {
        $generated_api_token = Str::random(80);
        $user = Auth::user();
        $user->api_token = $generated_api_token;
        $user->save();
        return redirect()->route('admin-profile');
    }
}
