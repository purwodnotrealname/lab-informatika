@extends('layouts.auth.index')

@section('title', 'Register')
@section('main')
    <div class="w-[max(40%,600px)] h-screen p-8 text-center bg-white flex flex-col justify-center">
        <h1 class="text-xl font-bold mb-4 uppercase">Signup</h1>
        <form id="form" method="POST" class="w-full" enctype="multipart/form-data" action="{{ route('register.store') }}">
            @csrf
            <div class="mt-2 text-start">
                <label for="full_name">Full Name</label>
                <input required type="text" name="full_name" id="full_name" placeholder="ex.: I Gede Putu Putra Wibawa"
                    class="w-full p-2 border border-gray-300" />
                @error('full_name')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-start">

                <label for="username">Username</label>
                <input required type="text" name="username" id="username" placeholder="ex.: gedeputra"
                    class="w-full p-2 border border-gray-300" />
                @error('username')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-start">
                <label for="nim">ID</label>
                <input required type="text" name="nim" id="nim" placeholder="ex.: 2308561000"
                    class="w-full p-2 border border-gray-300" />
                @error('nim')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-start">
                <label for="year">CLass Year</label>
                <select name="year" id="year" class="w-full p-2 border border-gray-300">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="mt-2 text-start">

                <label for="email">Email</label>
                <input required type="email" name="email" id="email" placeholder="gedeputra@gmail.com"
                    class="w-full p-2 border border-gray-300" />
                @error('email')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-start">
                <label for="password">Password</label>
                <input required type="password" name="password" id="password" placeholder="A secure passsword"
                    class="w-full p-2 border border-gray-300" />
                @error('password')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-start">
                <label for="student-proof">ID Document</label>
                <input required accept="image/*" type="file" name="student_proof"
                    class="w-full block border p-2  border-gray-300 file:bg-sky-500 file:text-white file:border-0 file:py-1 file:px-3">
                @error('student_proof')
                    <span class="text-red-500 block text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="p-2 text-white border-0 rounded-lg  bg-sky-500 hover:bg-sky-600 ">Signup</button>
            </div>
            <p>Already have an account? <a href="{{ route('login') }}" class="text-sky-500">Login here</a></p>
        </form>
    </div>
@endsection