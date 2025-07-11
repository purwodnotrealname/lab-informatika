<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $works = Work::with('tag')->get();
        // dd($works->get(1)->tag->name);
        return view('user.admin_user')->with('works', $works);
    }
    public function users()
    {
        $users = User::with('student')->get();
        return view('dashboard.usercontroller')->with('users', $users);
    }
}
