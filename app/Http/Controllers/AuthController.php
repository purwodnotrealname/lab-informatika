<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = new User;
        $student = new Student;

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'nim' => 'required|unique:students,nim|starts_with:2308561|size:10',
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'student_proof' => 'mimes:jpg,jpeg,png|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validated = $validator->validated();
        $stored_proof = Storage::disk('public')->putFileAs('student_proofs', $validated['student_proof'], $validated['nim'] . '_proof', );

        $validated = $validator->validated();

        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        $student->user_id = $user->id;
        $student->nim = $validated['nim'];
        $student->name = $validated['full_name'];
        $student->year = $request->get("year");
        $student->student_proof = $stored_proof;

        $student->save();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
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

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/showcase');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput($request->only('email'));

    }
}

