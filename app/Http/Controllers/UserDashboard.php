<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Tag;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $works = Work::where('user_id', '=', auth()->user()->id)->get();
        return view('user.user')->with(['works' => $works, 'tags' => $tags]);
    }
}
