<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^[a-zA-Z]+$/'], // Minimal 8 karakter dan hanya huruf
        ], [
            'password.regex' => 'Password hanya boleh terdiri dari huruf',
            'password.min' => 'Password minimal terdiri dari 8 karakter',
        ])->validate();

        if (User::where('name', $request->name)->exists()) {
            return redirect()->back()->withErrors(['name' => 'Nama sudah digunakan, coba nama lain']);
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email sudah digunakan, coba email lain']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "0",
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
