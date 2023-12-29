<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            "title" => "Login",
            "active" => "login",
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if (auth()->check() && auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard.index');
            } elseif (auth()->check() && auth()->user()->role === 'mitra' && auth()->user()->is_active === 1) {
                return redirect()->route('partners.dashboard.index');
            }
            else{
                Auth::logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                return redirect()->route('login');
            }
        }

        return back()->with('loginError','login Fail!');
    }

    public function logout() : RedirectResponse
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->intended('/');
    }
}
