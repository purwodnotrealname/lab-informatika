<!-- resources/views/auth/forgetPassword.blade.php -->

@extends('layouts.auth.index')

@section('title', 'Reset Password')
@section('main')
    <div class="w-[max(40%,600px)] h-screen p-8 text-center bg-white flex flex-col justify-center">
        <h1 class="text-xl font-bold mb-4 uppercase">Reset Password</h1>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" placeholder="eg. example@mail.com" type="email" class="w-full form-control p-2 border border-gray-300 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="button-primary p-2 text-white border-0 rounded-lg  bg-sky-500 hover:bg-sky-600 ">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
