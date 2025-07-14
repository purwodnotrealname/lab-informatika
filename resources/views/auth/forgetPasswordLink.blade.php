<!-- resources/views/auth/forgetPasswordLink.blade.php -->

@extends('layouts.auth.index')

@section('title', 'New Password')
@section('main')
    <div class="w-[max(40%,600px)] h-screen p-8 text-center bg-white flex flex-col justify-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header font-bold">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <!-- Hidden Token -->
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3 text-start">
                                <label for="email" class="form-label form-label mt-2 text-start">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="w-full form-control p-2 border border-gray-300"@error('email') is-invalid @enderror
                                    name="email" value="{{ old('email') ?? $email }}" required readonly autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 text-start">
                                <label for="password" class="form-label">{{ __('New Password') }}</label>
                                <input id="password" type="password"
                                    class="w-full form-control p-2 border border-gray-300 @error('password') is-invalid @enderror" name="password" required 
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 text-start">
                                <label for="password-confirm" class="form-label">{{ __('Confirm New Password') }}</label>
                                <input id="password-confirm" type="password" class="w-full form-control p-2 border border-gray-300"
                                    name="password_confirmation" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-primary p-2 text-white border-0 rounded-lg  bg-sky-500 hover:bg-sky-600">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection