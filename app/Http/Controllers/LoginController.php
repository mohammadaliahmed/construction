<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function RegisterUser(Request $request){
        $session=session();
        $ses_data = [
            'id' => "1",
            'name' => "ali",
            'portal_id' => "dsad",
            'logged_in' => TRUE,
        ];
        $session->set($ses_data);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
