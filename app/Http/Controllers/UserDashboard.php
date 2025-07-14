<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {

        $works = Work::where('user_id', '=', auth()->user()->id)->get();
        return view('user.user')->with('works', $works);
    }
}
