<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class ShowcaseController extends Controller
{
   public function index(Request $request)
{
    $sort = $request->query('sort', 'created_at');
    
    $works = Work::orderBy($sort, $sort === 'created_at' ? 'desc' : 'asc')
               ->get();
    
    return view('showcase', ['projects' => $works]);
}
}
