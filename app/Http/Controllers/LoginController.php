<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() {
        if(auth()->check()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function loginStudent() {

        $user = User::find(4);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginTa() {

        $user = User::find(6);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginProfessor() {

        $user = User::find(5);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
