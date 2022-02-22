<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Mail::to($user->email)->send(new VerificationMail($user));
        return redirect('/login');
    }
    public function getLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user == NULL || $user->is_verified == false) {
            return view('auth.login', ['notVerified' => true]);
        } else {
            if (Auth::attempt($credentials)) {
                return redirect('/');
            } else {
                return view('auth.login', ['invalidCredentials' => true]);
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
