@extends('layouts.auth.index')

@section('title', 'Register')
@section('main')
    <div class="w-[max(40%,600px)] h-screen p-8 text-center bg-white flex flex-col justify-center">
        <h1 class="text-xl font-bold mb-4 uppercase">Login</h1>
        <form id="form" method="POST" class="w-full" enctype="multipart/form-data" action="{{ route('login.auth') }}">
            @csrf
            <div class="mt-2 text-start">
                <label for="email">Email</label>
                <input required type="email" name="email" id="email" placeholder="gedeputra@gmail.com" class="w-full p-2 border border-gray-300"/>
            </div>
            @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <div class="mt-2 text-start">
                <label for="password">Password</label>
                <input required type="password" name="password" id="password" placeholder="Your secure password" class="w-full p-2 border border-gray-300"/>
            </div>
            <div class="mt-4">
                <button type="submit" class="p-2 text-white border-0 rounded-lg  bg-sky-500 hover:bg-sky-600 ">Signup</button>
            </div>
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-sky-500">Register here</a></p>
        </form>
    </div>
@endsection
