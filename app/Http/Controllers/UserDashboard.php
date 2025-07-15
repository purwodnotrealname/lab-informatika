<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Tag;
use App\Models\User;
use App\Models\PurchasedProject;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $purchasedProject = PurchasedProject::where('user_id', '=', auth()->user()->id)->with('project')->get();
        $user = User::with(['works', 'balance'])->get()[0];
        return view('user.user')->with(['tags' => $tags, 'user' => $user, 'purchasedProject' => $purchasedProject]);
    }
}
